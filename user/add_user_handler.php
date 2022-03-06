<?php

require_once "../models/MyDB.php";

$db = new MyDB("erp_system");

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone_number'];
$pass = $_POST['password'];
$conf_pass = $_POST['confirm_password'];
$user_type = $_POST['user_type'];

if($pass == $conf_pass)
{
    $hashpass = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `tbl_users`(`id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `user_type`, `active`) VALUES ('','$fname','$lname','$email','$phone','$hashpass','$user_type', 1)";

    $db->runSQL($sql);

    header("location:user_added.php");
    
} else {
    header("location:add_user.php");
}

// print_r($user_type);

?>