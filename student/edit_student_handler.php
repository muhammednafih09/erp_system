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

$student = User::getUserById($id, $db);
$student->firstName = $fname;
$student->lastName = $lname;
$student->email = $email;
$student->phoneNumber = $phone;
if ($pass != "") {
    $hashpass = password_hash($pass, PASSWORD_DEFAULT);
    $student->pass = $hashpass;
}
$student->department = Department::getOne($db, $department_id);
$student->update($db);

if (!empty($_FILES["user_photo"]["tmp_name"])) {
    $filepath = "../assets/images/users/" . $student->id . ".png";
    move_uploaded_file($_FILES["user_photo"]["tmp_name"], $filepath);
}

header("location:./manage_student.php");
?>
