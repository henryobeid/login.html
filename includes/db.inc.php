<?php

$dbhost = 'localhost';
$dbuser = 'testuser';
$dbpass = '12345';
$dbname = 'login_db';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("Unable to connect  with database" . mysqli_connect_error());
}