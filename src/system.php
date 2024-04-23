<?php 

    include_once "./vendor/autoload.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $errors = array();

    function insertMember($name, $email, $password){

        global $connect;
        $password = encodePassword($password);
        $code = rand(999999, 111111);
        $status = "notverified";

        $qry = "SELECT * FROM users_tbl WHERE email='$email'";
        $rows = checkMember($qry);

        if($rows > 0){

            return "This email is already exists!";

        }else{

            $qry = "INSERT INTO users_tbl (name, email, password, code, status) VALUES(?, ?, ?, ?, ?)";
            $res = sqlQuery($qry, [$name, $email, $password, $code, $status]);
            
            if($res){

                $title = "Email Verification Code";
                $body = "Your verification code is $code";
                $ans = sendMail($name, $email, $password, $title, $body);

                if($ans) {

                    $info = "We've sent a verification code to your email - $email";
                    $memberInfo = array("info"=>$info, "name"=>$name, "email"=>$email, "password"=>$password);
                    setSession($memberInfo);
                    return "Sccess Email Sending";

                }else{

                    return "Failed while sending code!";

                }

            }else{

                return "Register Fail....!";

            }

        }

    }

    function memberLogin($sql, $user , $pass) {

        global $connect;
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':useremail', $user, PDO::PARAM_STR);
        $stmt->bindValue(':password', $pass, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        $acc = ['count'=>$count, 'row'=>$row];
        
        if($acc['count'] == 1 && !empty($acc['row'])) {

            return $acc;
            
        }

    }

    function checkOTP($otp_code){

        global $errors;
        $email = "";
        $password = "";
        $name = "";
        // $info = "";
        $qry = "SELECT * FROM users_tbl WHERE code='$otp_code'";
        $rows = checkMember($qry);

        if($rows > 0){

            $fetchData = getItems($qry);
            $fetchCode = $fetchData[0]->code;
            $email = $fetchData[0]->email;

            $code = 0;
            $status = 'verified';

            $sql = "UPDATE users_tbl SET code =?, status =? WHERE code=$fetchCode";
            $updateRes = sqlQuery($sql, [$code, $status]);

            if($updateRes){

                $memberInfo = array("name"=>$name, "password"=>$password);
                setSession($memberInfo);
                return "Correct";

            }else{

                $errors['otp-error'] = "Failed while updating code!";

            }
        }else{
            
            $errors['otp-error'] = "You've entered incorrect code!";

        }
    
    }

    function forgetPassword($email){

        global $errors;
        $sql = "SELECT * FROM users_tbl WHERE email='$email'";
        $res = checkMember($sql);

        if($res > 0) {

            $getData = getItems($sql);
            $name = $getData[0]->name;
            $password = $getData[0]->password;
            $code = rand(999999, 111111);

            $sql = "UPDATE users_tbl SET code =? WHERE email='$email'";
            $updateReset = sqlQuery($sql, [$code]);

            if($updateReset){

                $title = "Password Reset Code";
                $body = "Your password reset code is $code";
                $res = sendMail($name, $email, $password, $title, $body);
                if($res) {

                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $memberInfo = array("info"=>$info, "name"=>$name, "email"=>$email, "password"=>$password);
                    setSession($memberInfo);
                    return "Sccess Email Sending";

                }else{

                    $errors['otp-error'] = "Failed while sending code!";

                }

            }else{
                $errors['db-error'] = "Something went wrong!";
            }

        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    function changePassword($password, $cpassword) {
        
        global $errors;
        setSession(array("info"=>""));
        if($password !== $cpassword){

            $errors['password'] = "Confirm password not matched!";

        }else{

            $code = 0;
            $email = getSession('email'); //getting this email using session
            $sql = "UPDATE users_tbl SET code=?, password=? WHERE email='$email'";
            $run_query = sqlquery($sql, [$code, $password]);

            if($run_query){

                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                return "Correct";

            }else{

                $errors['db-error'] = "Failed to change your password!";

            }
        }
    }

    function checkMember($sql) {

        global $connect;
        $sql = $connect->prepare($sql);
        $sql->execute();
        $count = $sql->rowCount();

        return $count;
    }

    function encodePassword($pass) {

        $pass = md5($pass);
        $pass = sha1($pass);
        $pass = crypt($pass, $pass);

        return $pass;
    }

    function sqlQuery($sql, $params = []) {

        global $connect;
        $stmt = $connect->prepare($sql);

        return $stmt->execute($params);
    }

    function getItems($sql){

        global $connect;
        $statement = $connect->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    function sendMail($name, $email, $password, $title, $message){


        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Username   = 'kyawmintun.kmt414@gmail.com';
        $mail->Password   = 'vohjfllrvjqfhssx'; 
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        //Recipients
        $mail->setFrom("kyawmintun.kmt414@gmail.com", "Kyaw Min Tun");
        $mail->addAddress($email, $name);

        // for Content
        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body = $message;
        
        $ans = $mail->send();
        return $ans;
    }








?>