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

// print_r($_POST);

$match = User::getUserByEmail($email, $db);

if($match){
    header("location: add_student.php?msg=another%20user%20with%20same%20email%20exists");
    exit;
}

// var_dump($match);

// die();

$hashpass = password_hash($pass, PASSWORD_DEFAULT);

$student = new User(null, $fname, $lname, $email, $phone, $hashpass, "student", Department::getOne($db, $department_id), 1);
// print_r($student);
$student->create($db);

$filepath = "../assets/images/users/".$student->id.".png";

move_uploaded_file($_FILES["user_photo"]["tmp_name"], $filepath);
// die();
header("location:./manage_student.php");
?>