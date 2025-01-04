<?php

function signupFieldEmpty($email, $pass, $pass_auth){
    $result;
    if(empty($email) || empty($pass) || empty($pass_auth)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function notValidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function passAuthFailed($pass, $pass_auth){
    $result;
    if ($pass !== $pass_auth){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emailExist($conn, $email){
    $sql = "SELECT * FROM users WHERE email =?;";
    $stmt = mysqli_stmt_init ($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../newAccount.php?err=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $result = mysqli_stmt_num_rows($stmt) > 0;

    mysqli_stmt_close($stmt);
    return $result;
}

function createAccount($conn, $email, $pass){
    $sql = "INSERT INTO users (email, password) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../newAccount.php?err=stmtfailed");
        exit();
    }

    $passHarshed = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, 'ss', $email, $passHarshed);
    mysqli_stmt_execute($stmt);

    session_start();
    $_SESSION['useremail'] = $email;
    mysqli_stmt_close($stmt);
    header("Location: ../dashboard.php");
    exit();
}

//
//Sign functions
//
function signinFieldEmpty($email, $pass){
    $result;
    if(empty($email) || empty($pass)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function login($conn, $email, $pass){
    $sql = "SELECT * FROM users WHERE email =?;";
    $stmt = mysqli_stmt_init ($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?err=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(!$row = mysqli_fetch_assoc($result)){
        mysqli_stmt_close($stmt);
        header("Location: ../index.php?err=usernull");
        exit();
    }

    $hashedPass = $row['password'];
    if(!password_verify($pass, $hashedPass)){
        mysqli_stmt_close($stmt);
        header("Location: ../index.php?err=wrongpass");
        exit();
    }

    session_start();
    $_SESSION['useremail'] = $row['email'];
    $_SESSION['userid'] = $row['id'];
    mysqli_stmt_close($stmt);
    header("Location: ../dashboard.php");
    exit();
}