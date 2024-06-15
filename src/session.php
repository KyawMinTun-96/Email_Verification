<?php 

    session_start();

    function setSession($params) {

        foreach($params as $key=>$val) {

            $_SESSION[$key] = $val;

        }
    }

    function checkSession($key){

        return isset($_SESSION[$key]);

    }

    function getSession($key){

        return $_SESSION[$key];

    }


    function setUserCookie($params, $time) {

        foreach($params as $key=>$val) {

            setcookie("$key", $val, $time);

        }

    }


    function checkCookie($key) {

        return isset($_COOKIE[$key]);
    }


    function getCookie($key) {

        return $_COOKIE[$key];

    }



    function autoLogin($email, $password) {
        
        $sql = "SELECT * FROM users_tbl WHERE email =:useremail AND password =:password";
        $res = memberLogin($sql, $email, $password);
        $fetch_pass = $res['row']['password'];
        $status = $res['row']['status'];
        $name = $res['row']['name'];

        if($password === $fetch_pass){
    
            if($status == 'verified'){

                $userInfo = array("email"=>$email, "password"=>$password, "name"=>$name);
                setSession($userInfo);
                return true;
            }

        }
    }



?>