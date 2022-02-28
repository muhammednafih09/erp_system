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
        <div class="main-content">
            <div class="" style="padding-top: 65px;">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="card p-4 secondary-color">

                                <table class="table secondary-color">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Year</th>
                                            <th scope="col">Section</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td><a href="<?= $root_path ?>user/update_user.php"><button class="btn primary-color text-white">Edit</button></a></td>
                                            <td><button class="btn bg-danger text-white">Delete</button></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td><a href="<?= $root_path ?>user/update_user.php"><button class="btn primary-color text-white">Edit</button></a></td>
                                            <td><button class="btn bg-danger text-white">Delete</button></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td><a href="<?= $root_path ?>user/update_user.php"><button class="btn primary-color text-white">Edit</button></a></td>
                                            <td><button class="btn bg-danger text-white">Delete</button></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>