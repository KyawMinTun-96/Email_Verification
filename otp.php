<?php 

    include_once "./public/header.php";

    if(checkSession("name")) {

        if(isset($_POST['check'])){

            $otp = trim($_POST['otp']);
            $ans = checkOTP($otp);

            if($ans === "Correct") {

                header('location: index.php');
                exit();
                
            }

        }

        global $errors;

?>

            <section class="otp">
                <div class="container">
                    <div class="row">
                        <div class="pt-4 pb-1 px-3 position-absolute top-50 start-50 translate-middle rounded shadow bgColor2 form">
                            <h2 class="text-center mb-4">Code Verification</h2>
                            <form action="otp.php" method="POST" autocomplete="off">

                                <?php 
                                if(checkSession('info')){
                                    ?>
                                    <div class="alert alert-success text-center">
                                        <?php echo getSession('info'); ?>
                                    </div>
                                    <?php
                                }
                                ?>

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
                                    <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                                </div>
                                <div class="d-flex flex-row justify-content-end">
                                    <input class="btn btn-primary btn-md mt-4 mb-4 textSize btn-login" type="submit" name="check" value="Verify">
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