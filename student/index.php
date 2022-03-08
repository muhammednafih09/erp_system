<?php
session_start();
$root_path = "..";
$page_name = "student";


require_once "$root_path/models/MyDB.php";
require_once "$root_path/models/User.php";

if(!User::isUserLoggedIn()){
    header("location:$root_path/user/login.php");
}

$db = new MyDB();
$loggedIn_user = User::getUserFromSession();
require_once "$root_path/components/dashButton.php";
?>

<html lang="en">

<head>
    <?php require_once "$root_path/components/head.php"; ?>
    <title>Student</title>
</head>

<body>
    <?php
    require_once "$root_path/components/side_bar.php";
    ?>
    <div class="container">
        <div class="main-content">
            <div class="" style="padding-top: 65px;">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        dashButton("$root_path/student/manage_student.php", "pen-to-square", "Manage Student");
                        ?>

                    </div>

                </div>

            </div>
        </div>
</body>

</html>