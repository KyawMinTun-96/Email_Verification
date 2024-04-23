<?php 
    include_once "./public/header.php";

    if(isset($_POST['login-now'])){

        header('Location: login.php');

    }
?>

<section class="password_changed">
    <div class="container">
        <div class="row">
            <div class="pt-5 pb-4 px-5 position-absolute top-50 start-50 translate-middle rounded shadow bgColor2 form">
            <?php 
            if(checkSession("info")){
                ?>
                <div class="alert alert-success text-center">
                <?php echo getSession("info"); ?>
                </div>
                <?php
            }
            ?>
                <form action="password_changed.php" method="POST">
                    <div class="d-flex flex-row justify-content-end">
                        <input class="btn btn-primary btn-md mt-4 mb-4 textSize btn-login" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php 

?>