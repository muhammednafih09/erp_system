<?php
session_start();
require_once "../models/User.php";
require_once "../models/MyDB.php";

$db = new MyDB();

$logged_user = User::getUserFromSession();
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone_number'];
$pass = $_POST['password'];

$user = User::getUserById($logged_user->id, $db);
$user->firstName = $fname;
$user->lastName = $lname;
$user->email = $email;
$user->phoneNumber = $phone;
if($pass != ""){
    $hashpass = password_hash($pass, PASSWORD_DEFAULT);
    $user->pass = $hashpass;
}
// $user->department = Department::getOne($db, $department_id);
$user->update($db);

$_SESSION["user"] = $user->toArray();

if(! empty($_FILES["user_photo"]["tmp_name"]) ){
    $filepath = "../assets/images/users/".$user->id.".png";
    move_uploaded_file($_FILES["user_photo"]["tmp_name"], $filepath);
}

header("location:profile.php");

?>