<?php 

    session_start();
    session_unset();
    session_destroy();

    if(isset($_COOKIE['email']) && isset($_COOKIE['password'])) {

        removeCookie('email');
        removeCookie('password');
        removeCookie('name');

    }

    header("location: index.php");


    function removeCookie($key) {

        if(isset($_COOKIE[$key])) {

            unset($_COOKIE[$key]);
            setcookie($key, '', time() - 3600, '/'); // empty value and old timestamp
            
        }
    
    }
?>