<?php
$root_path = '..';

require_once "$root_path/models/MyDB.php";
require_once "$root_path/models/User.php";

$db = new MyDB();

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
                    <a href="add_staff.php" class="btn btn-success float-end">Add Staff</a>
                    <br><br>

                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="card p-4 secondary-color">

                                <table class="table secondary-color">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Department</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (User::getAll($db) as $index=> $userObj) : ?>
                                            <tr>
                                                <th scope="row"><?= $index+1; ?></th>
                                                <td><?= $userObj->firstName; ?></td>
                                                <td><?= $userObj->lastName; ?></td>
                                                <td><?= $userObj->department->name; ?></td>
                                                <td><a href="<?= $root_path ?>user/update_user.php"><button class="btn primary-color text-white">Edit</button></a></td>
                                                <td><button class="btn bg-danger text-white">Delete</button></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>

</body>

</html>