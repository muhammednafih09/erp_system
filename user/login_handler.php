<?php

session_start();
require "../models/MyDB.php";

$db = new MyDB('erp_system');
$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM `tbl_users` WHERE email='$email';";

$row = $db->getRows($sql)[0];

print_r($row);

if($row){
    $result = password_verify($pass, $row['password']);

    if($result){
        echo "logged in";
        $_SESSION["user"] = $row;
        header("location:../dashboard/index.php");
    } else{
        echo "wrong credentials";
        header("location:login.php?msg=wrong%20password");
    }
} else{
    echo "wrong credentials";
    header("location:login.php?msg=wrong%20password");
}

?>