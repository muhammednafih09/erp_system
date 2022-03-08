<?php
session_start();
$root_path = "..";
$page_name = "staff";


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
    <title>Staff</title>
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
                        dashButton("$root_path/staff/manage_staff.php", "pen-to-square", "Manage Staff");
                        ?>
                        <!-- <div class="col-sm-12 col-md-4 pb-5">
                            <a href="<?= $root_path ?>user/view_user.php">
                                <div class="card primary-color text-white align-items-center pt-3">
                                    <i class="fa-solid fa-pen-to-square fa-3x"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Manage Staff</h5>
                                    </div>
                                </div>
                            </a>
                        </div> -->

                        <!-- <div class="col-sm-12 col-md-4 pb-5">
                            <a href="<?= $root_path ?>user/add_user.php">
                                <div class="card primary-color text-white align-items-center pt-3">
                                    <i class="fa-solid fa-circle-plus fa-3x"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Add Staff</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-12 col-md-4 pb-5">
                            <a href="<?= $root_path ?>user/update_user.php">
                                <div class="card primary-color text-white align-items-center pt-3">
                                    <i class="fa-solid fa-pen-to-square fa-3x"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Update Staff</h5>
                                    </div>
                                </div>
                            </a>
                        </div> -->

                    </div>

                </div>

            </div>
        </div>
</body>

</html>