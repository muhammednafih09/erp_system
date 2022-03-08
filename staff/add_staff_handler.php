<?php
require_once "../models/User.php";
require_once "../models/MyDB.php";

$db = new MyDB();

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone_number'];
$pass = $_POST['password'];
$department_id = $_POST['department_id'];


$hashpass = password_hash($pass, PASSWORD_DEFAULT);

$staff = new User(null, $fname, $lname, $email, $phone, $hashpass, "staff", Department::getOne($db, $department_id), 1);
$staff->create($db);

$filepath = "../assets/images/users/".$staff->id.".png";

move_uploaded_file($_FILES["user_photo"]["tmp_name"], $filepath);

header("location:./manage_staff.php");
?>