<?php
require_once "../models/User.php";
require_once "../models/MyDB.php";

$db = new MyDB();

$id = $_POST['id'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone_number'];
$pass = $_POST['password'];
$department_id = $_POST['department_id'];

$staff = User::getUserById($id, $db);
$staff->firstName = $fname;
$staff->lastName = $lname;
$staff->email = $email;
$staff->phoneNumber = $phone;
if($pass != ""){
    $hashpass = password_hash($pass, PASSWORD_DEFAULT);
    $staff->pass = $hashpass;
}
$staff->department = Department::getOne($db, $department_id);
$staff->update($db);

if(! empty($_FILES["user_photo"]["tmp_name"]) ){
    $filepath = "../assets/images/users/".$staff->id.".png";
    move_uploaded_file($_FILES["user_photo"]["tmp_name"], $filepath);
}

header("location:./manage_staff.php");
