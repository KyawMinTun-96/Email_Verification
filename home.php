<?php 
    include_once "./public/header.php";

    if(checkCookie("email") && checkCookie("password")) {

        $email = getCookie("email");
        $password = getCookie("password");
        $res = autoLogin($email, $password);

        if($res) {?>
<?php

        include_once "./navbar.php";

        ?>
        <h1>Welcome to Home Page!</h1>
        
<?php 
        include_once "./public/footer.php";

           

        }
        

    }else{

    if(checkSession("name")){

        include_once "./navbar.php";

?>
        <h1>Welcome to Home Page!</h1>
        
<?php 
        include_once "./public/footer.php";
    
    }else {

        header("Location: index.php");

    }
}
?>