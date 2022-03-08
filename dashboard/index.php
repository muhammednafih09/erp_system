<?php
session_start();
$root_path = "..";
$page_name = "dashboard";


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
    <title>Dashboard</title>
</head>

<body>
    <?php
    require_once "$root_path/components/side_bar.php";
    ?>
    <div class="container">
        <div class="main-content">
            <div class="" style="padding-top: 65px;">
                <div class="container-fluid">
                    <div class="card secondary-color text-dark">
                        <p class="px-3 mt-3"><b>Welcome <?= strtoupper($loggedIn_user->firstName." ".$loggedIn_user->lastName) ?></b></p>
                    </div>

                    <br>
                    <div class="row">
                        <?php
                            dashButton("$root_path/user/profile.php", "user", "Profile");

                            if(User::getUserTypeFromSession() == "staff"){
                                dashButton("$root_path/staff/", "chalkboard-user", "Staff");
                                dashButton("$root_path/student/", "graduation-cap", "Student");
                                dashButton("$root_path/common/error_503.php", "list-check", "Attendance");
                                dashButton("$root_path/common/error_503.php", "coins", "Accounts");
                            }
                            dashButton("$root_path/common/error_503.php", "gear", "Settings");
                        ?>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>