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




?>