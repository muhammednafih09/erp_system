<?php

session_start();
require_once "../models/MyDB.php";
require_once "../models/User.php";

$db = new MyDB('erp_system');
$email = $_POST['email'];
$pass = $_POST['password'];

$user = User::getUserByEmail($email, $db);

if($user){
    $result = password_verify($pass, $user->pass);

    if($result){
        echo "logged in";
        $_SESSION["user"] = $user->toArray();
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