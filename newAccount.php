
<?php include_once 'includes/header.inc.php'; ?>
<?php
                if(isset($_SESSION['useremail'])){
                    $useremail = $_SESSION['useremail'];
                    header("Location: dashboard.php");
                    exit();
                }

        ?>
    <div class="container">
        <div class="form_texts">
            <p>Get travel updates</p>
            <h2>Welcome, Sign In</h2>
            <p class="account_text">Already a member? <a href="index.php">Login Here</a></p>
        </div>

        <form action="actions/signUp.php" method="post">

        <?php
            if(isset($_GET['err'])){
                $error = $_GET['err'];

                if($error == 'accessdenied'){
                    echo"<p style='color:red;'> This page is private </p>";
                }else if($error == 'fieldempty'){
                    echo"<p style='color:red;'> Please fill all fields </p>";
                }else if($error == 'emailinvalid'){
                    echo"<p style='color:red;'> This email is invalid </p>";
                }else if($error == 'passmismatch'){
                    echo"<p style='color:red;'> Your password does not match </p>";
                }else if($error == 'userexist'){
                    echo"<p style='color:red;'> This user already exist, kindly login </p>";
                }else if($error == 'stmtfailed'){
                    echo"<p style='color:red;'> An error occured </p>";
                }
            }
        
        ?>
            <div class="field_container">
                <label for="form_email">Email:</label>
                <input name="user_email" type="email" id="form_email" class="form_field" placeholder="example@email.com">
            </div>
            <div class="field_container">
                <label for=" form_pass">Password:</label>
                <input name="user_pass" type="password" id="form_pass" class="form_field" placeholder="******">
            </div>

            <div class="field_container">
                <label for=" confirm_pass">Confirm Password:</label>
                <input name="user_pass_auth"  type="password" id="confirm_pass" class="form_field" placeholder="******">
            </div>


            <button type="submit" name="signup">Sign Up</button>
        </form>
    </div>
<?php include_once 'includes/footer.inc.php'; ?>