<?php
$root_path = '../';

?>

<html lang="en">

<head>
    <?php require "$root_path/components/head.php"; ?>
    <title>Dashboard</title>
</head>

<body>
    <?php
    require "$root_path/components/side_bar.php";
    ?>
    <div class="container">
        <div class="" style="margin-left:12%;">
            <div class="" style="padding-top: 6%;">
                <div class="row">
                    <div class="col-12 text-white">
                        <div class="card primary-color p-2">
                            <p>Welcome HR</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row pb-5">
                    <div class="col-4">
                        <div class="card primary-color text-white align-items-center pt-3" style="width: 18rem;">
                            <i class="fa-solid fa-user fa-3x"></i>
                            <div class="card-body text-center">
                                <h5 class="card-title">Profile</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card primary-color text-white align-items-center pt-3" style="width: 18rem;">
                            <i class="fa-solid fa-chalkboard-user fa-3x"></i>
                            <div class="card-body text-center">
                                <h5 class="card-title">Staff</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card primary-color text-white align-items-center pt-3" style="width: 18rem;">
                            <i class="fa-solid fa-graduation-cap fa-3x"></i>
                            <div class="card-body text-center">
                                <h5 class="card-title">Student</h5>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row pb-4">

                    
                    <div class="col-4">
                        <div class="card primary-color text-white align-items-center pt-3" style="width: 18rem;">
                            <i class="fa-solid fa-coins fa-3x"></i>
                            <div class="card-body text-center">
                                <h5 class="card-title">Accounts</h5>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="card primary-color text-white align-items-center pt-3" style="width: 18rem;">
                            <i class="fa-solid fa-gear fa-3x"></i>
                            <div class="card-body text-center">
                                <h5 class="card-title">Settings</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>