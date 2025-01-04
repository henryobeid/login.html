        
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
            <p class="account_text">Not a member? <a href="newAccount.php">Create account</a></p>
        </div>
        <form action="actions/signin.php" method="post">
            <?php
            if(isset($_GET['err'])){
                $error = $_GET['err'];

                if($error == 'accessdenied'){
                    echo"<p style='color:red;'> This page is private </p>";
                }else if($error == 'fieldempty'){
                    echo"<p style='color:red;'> Please fill all fields </p>";
                }else if($error == 'emailinvalid'){
                    echo"<p style='color:red;'> This email is invalid </p>";
                }else if($error == 'usernull'){
                    echo"<p style='color:red;'> User does not exist </p>";
                }else if($error == 'wrongpass'){
                    echo"<p style='color:red;'> Invalid login details </p>";
                }else if($error == 'stmtfailed'){
                    echo"<p style='color:red;'> An error occured </p>";
                }else if($error == 'nosession'){
                    echo"<p style='color:red;'> Access denied. Please login </p>";
                }
            }
        
        ?>
            <div class="field_container">
                <label for="form_email">Email:</label>
                <input name="user_email"type="email" id="form_email" class="form_field" placeholder="example@email.com">
            </div>
            <div class="field_container">
                <label for=" form_pass">Password:</label>
                <input name="user_pass" type="password" id="form_pass" class="form_field" placeholder="******">
            </div>

            <button type="submit" name="signin">Login</button>
        </form>
    </div>
<?php include_once 'includes/footer.inc.php'; ?>
