
<?php 

    include_once "./public/header.php";
    if(isset($_POST['login'])) {

        $email = trim($_POST['email']);
        $password = encodePassword(trim($_POST['password']));

        if(empty($email)){
            echo "<p class='alert alert-danger'>Email is required!</p>";
        }

        if(empty($password)){
            echo "<p class='alert alert-danger'>Password is required!</p>";
        }

        $sql = "SELECT * FROM users_tbl WHERE email =:useremail AND password =:password";
        $res = memberLogin($sql, $email, $password);
        $fetch_pass = $res['row']['password'];
        $status = $res['row']['status'];
        $name = $res['row']['name'];

        if($password === $fetch_pass){

            if($status == 'verified'){

                $userInfo = array("email"=>$email, "password"=>$password, "name"=>$name);
                setSession($userInfo);
                header('location: home.php');

            }else{

                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;
                header('location: otp.php');

            }

        }else{

            $errors['email'] = "Incorrect email or password!";

        }

    }

?>

<section class="login">
    <div class="container">
        <div class="row">
            <div class="pt-4 pb-1 px-5 position-absolute top-50 start-50 translate-middle rounded shadow bgColor2 form">

                <h2 class="text-center mb-4 mylog">Login </h2>

                <form action="login.php" method="post">
                    <div class="form-group mb-3">
                        <label for="name" class="textSize">Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="email" id="name" value='<?php 
                        
                        if(checkSession("email")){

                            echo getSession("email");
                            
                        }                        
                        ?>'>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pass">Passwrod</label>
                        <input type="password" placeholder="passwrod" class="form-control" name="password" id="pass">
                    </div>
                    <div class="fotm-group d-flex align-items-center">
                        <span class="textSize">Remember me &nbsp;</span>
                        <input type="checkbox" name="remember">
                        <a href="forget_password.php" class="textSize anchorColor ms-auto">Forget Password?</a>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                        <button type="submit" name="login" class="btn btn-primary btn-sm mt-4 mb-4 textSize btn-login">Login</button>
                    </div>
                </form>

                <div class="text-center">
                    <p class="textSize">Don't have an account?&nbsp;<a href="signup.php" class="anchorColor">Create One</a></p>
                </div>
            </div>
        </div>
    </div>
</section>