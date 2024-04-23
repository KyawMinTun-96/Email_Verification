<?php

 include_once "./public/header.php" ?>
<?php 
    if(isset($_POST['name'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);


        if(!empty($name) && !empty($email) && !empty($password)) {

            $res = checkNewUser($name, $email, $password);
        
            if($res === "Sccess Email Sending") {
    
                header("Location: otp.php");
                exit();
                
            }

        }else{
            
            echo "<script>alert('Fill the correct format!');</script>";
            
        }


    }

?>
<section class="signup">
    <div class="container">
        <div class="row">
            <div class="pt-4 pb-1 px-5 position-absolute top-50 start-50 translate-middle rounded shadow bgColor2 form">

                <h2 class="text-center mb-4 ftColor3">Sign Up</h2>

                <form action="signup.php" method="post">
                    <div class="form-group mb-3">
                        <label for="name" class="ftColor3">User Name</label>
                        <input type="text" class="form-control" name="name" placeholder="enter username..." id="name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="ftColor3">Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="enter email..." id="email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="pass" class="ftColor3">Passwrod</label>
                        <input type="password" placeholder="enter passwrod..." class="form-control" name="password" id="pass">
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                        <button type="submit" name="signup" class="btn btn-primary btn-sm mt-4 mb-4 textSize btn-submit">Signup</button>
                    </div>
                </form>

                <div class="text-center">
                    <p class="ftColor3">Already account?&nbsp;<a href="./login.php" class="anchorColor">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>