<?php 
    include_once "./public/header.php";

    if(checkSession("name")){

        include_once "./navbar.php";

?>
        <h1>Welcome to Home Page!</h1>
        
<?php 
        include_once "./public/footer.php";
    
    }else {

        header("Location: index.php");

    }

?>