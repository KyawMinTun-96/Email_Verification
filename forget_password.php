
<?php 

    include_once "./public/header.php";

    if(isset($_POST['forget'])){

        $email = trim($_POST['email']);
        $res = forgetPassword($email);

        if($res === "Sccess Email Sending"){

            header("Location: reset.php");
            exit();

        }

    }

    global $errors;

?>

<section class="forget">
    <div class="container">
        <div class="row">
            <div class="pt-4 pb-4 px-5 position-absolute top-50 start-50 translate-middle rounded shadow bgColor2 form">
            <h2 class="text-center mb-4">Forgot Password</h2>

                <form action="forget_password.php" method="POST" autocomplete="on">
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php //echo $email ?>">
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                        <input class="btn btn-primary btn-md mt-4 mb-4 textSize btn-login" type="submit" name="forget" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



<?php 

?>