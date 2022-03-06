<?php
session_start();
$root_path = '../';
$page_name = "dashboard";

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
                        <p class="px-3 mt-3"><b>Welcome <?= $_SESSION['user']['first_name'] ?></b></p>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 pb-5">
                            <a href="../admin/profile.php">
                                <div class="card primary-color text-white align-items-center pt-3">
                                    <i class="fa-solid fa-user fa-3x"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Profile</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php if(User::getUserTypeFromSession() == "staff"): ?>
                        <div class="col-sm-12 col-md-4 pb-5">
                            <a href="<?= $root_path ?>staff/index.php">
                                <div class="card primary-color text-white align-items-center pt-3">
                                    <i class="fa-solid fa-chalkboard-user fa-3x"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Staff</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-12 col-md-4 pb-5">
                            <a href="">
                                <div class="card primary-color text-white align-items-center pt-3">
                                    <i class="fa-solid fa-graduation-cap fa-3x"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Student</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php endif ?>

                        <div class="col-sm-12 col-md-4 pb-5">
                            <a href="<?= $root_path ?>common/error_503.php">
                                <div class="card primary-color text-white align-items-center pt-3">
                                    <i class="fa-solid fa-list-check fa-3x"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Attendance</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-12 col-md-4 pb-5">
                            <a href="<?= $root_path ?>common/error_503.php">
                                <div class="card primary-color text-white align-items-center pt-3">
                                    <i class="fa-solid fa-coins fa-3x"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Accounts</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-12 col-md-4 pb-5">
                            <a href="<?= $root_path ?>common/error_503.php">
                                <div class="card primary-color text-white align-items-center pt-3">
                                    <i class="fa-solid fa-gear fa-3x"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Settings</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>