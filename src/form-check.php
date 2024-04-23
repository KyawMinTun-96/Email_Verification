<?php 


function checkNewUser($name, $email, $password){

    if(checkName($name)){

        if(checkEmail($email)) {

            if(checkpassword($password)) {

                return insertMember($name, $email, $password);

            }else{

                return "Incorrect Password (eg.[A-Z][a-z][0-9][@,!..]";
            }

        }else {

            return "Incorrect Email!";

        }

    }else{

        return "Incorrect User Name!";

    }


}

function checkName($name){

    if(strlen($name) > 6){

        $bol = preg_match("/^[\w\s]+$/", $name);
        return $bol;

    }else{

        return false;

    }
}

function checkEmail($email){

    if(strlen($email) >= 15){
                        // /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
        $bol = preg_match("/^[a-zA-Z0-9._%+-]+@[a-z]+\.[a-z]{2,4}+$/", $email);

        return $bol;

    }else{

        return false;

    }
}

function checkPassword($password){

    if(strlen($password) >= 8){

        $bol = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', $password);

        return $bol;

    }else{

        return false;

    }

}


?>

