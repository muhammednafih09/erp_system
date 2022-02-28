<?php
require "./MyDB.php";
require "./User.php";

session_start();

$db = new MyDB("erp_system");
$user = User::getUserById(1, $db);
// echo $user->firstName." ".$user->lastName;
echo $user->getProfilePicUrl();
?>