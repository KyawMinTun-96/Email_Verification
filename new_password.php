<?php 
    include_once "./public/header.php";

    if(checkSession("name")){

        if(isset($_POST['change-password'])){

            $password = encodePassword(trim($_POST['password']));
            $cPassword = encodePassword(trim($_POST['cpassword']));


            $ans = changePassword($password, $cPassword);

            if($ans === "Correct") {

                header('location: password_changed.php');
                exit();

            }

            global $errors;

        }

?>

<section class="new_password">
    <div class="container">
        <div class="row">
            <div class="pt-4 pb-4 px-5 position-absolute top-50 start-50 translate-middle rounded shadow bgColor2 form">

            <h2 class="text-center mb-4">New Password</h2>

                <form action="new_password.php" method="POST" autocomplete="off">
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group mb-3">
                        <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                        <input class="btn btn-primary btn-md mt-4 mb-4 textSize btn-login" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php 
    }else{

        header("Location: home.php");

    }
?>