<?php ini_set('display_errors', 1);
error_reporting(E_ALL); ?>
<?php 
if(isset($_POST['signin'])){
    $email = $_POST['user_email'];
    $pass = $_POST['user_pass'];

    require_once "../includes/db.inc.php";
    include_once "../includes/functions.inc.php";
    
    if(signinFieldEmpty($email, $pass) !== false){
        header("Location: ../index.php?err=fieldempty");
        exit();
    }
    if(notValidEmail($email) !== false){
        header("Location: ../index.php?err=emailinvalid");
        exit();
    }

    login($conn, $email, $pass);

}else{
    header("Location: ../index.php?err=accessdenied");
    exit();
}
?>