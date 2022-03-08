<?php
require_once "../models/User.php";
require_once "../models/MyDB.php";

$db = new MyDB();

$id = $_GET['id'];

$user = User::getUserById($id, $db);

$user->active = 0;

$user->update($db);

header("location:./manage_staff.php");
?>