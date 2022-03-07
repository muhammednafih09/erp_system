<?php
session_start();
$root_path = '..';
$page_name = "dashboard";

require_once "../models/User.php";
?>

<html lang="en">

<head>
    <?php require_once "$root_path/components/head.php"; ?>
    <title>Error 503</title>
</head>

<body>

    <?php
    require_once "$root_path/components/side_bar.php";
    ?>

    <div class="container">
        <div class="main-content">
            <div class="" style="padding-top: 65px;">
                <div class="container-fluid">
                    <div class="card secondary-color text-dark text-center">
                        <p class="px-3 mt-3"><b>Error 503!</b></p>
                        <p class="px-3 mt-3">Page is under construction.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>