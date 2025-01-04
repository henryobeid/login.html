<?php ini_set('display_errors', 1);
error_reporting(E_ALL); ?>
<?php 
if(isset($_POST['signup'])){
    $email = $_POST['user_email'];
    $pass = $_POST['user_pass'];
    $passauth = $_POST['user_pass_auth'];

    require_once "../includes/db.inc.php";
    include_once "../includes/functions.inc.php";
    
    if(signupFieldEmpty($email, $pass, $passauth) !== false){
        header("Location: ../newAccount.php?err=fieldempty");
        exit();
    }
    if(notValidEmail($email) !== false){
        header("Location: ../newAccount.php?err=emailinvalid");
        exit();
    }
    if(passAuthFailed($pass, $passauth) !== false){
        header("Location: ../newAccount.php?err=passmismatch");
        exit();
    }
    if(emailExist($conn, $email)){
        header("Location: ../newAccount.php?err=userexist");
        exit();
    }

    createAccount($conn, $email, $pass);

}else{
    header("Location: ../newAccount.php?err=accessdenied");
    exit();
}
?>