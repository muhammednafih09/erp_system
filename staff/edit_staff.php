<?php
session_start();
$root_path = "..";
$page_name = "staff";


require_once "$root_path/models/MyDB.php";
require_once "$root_path/models/User.php";

if (!User::isUserLoggedIn()) {
    header("location:$root_path/user/login.php");
}

$db = new MyDB();
$loggedIn_user = User::getUserFromSession();
$id = $_GET["id"];

$target_staff = User::getUserById($id, $db);
?>

<html lang="en">

<head>
    <?php require_once "$root_path/components/head.php"; ?>
    <title>Edit Staff</title>
</head>

<body>
    <?php require_once "$root_path/components/side_bar.php"; ?>
    <div class="container">
        <div class="main-content">
            <div class="" style="padding-top: 65px;">
                <div class="container-fluid p-2">
                    <div class="card p-4 secondary-color">
                        <div class="card-title text-center">
                            <h4>Edit Staff</h4>
                        </div>
                        <div class="card-body">
                            <form action="edit_staff_handler.php" name="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $target_staff->id ?>">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $target_staff->firstName ?>" required>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control" value="<?= $target_staff->lastName ?>" required>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="email">Email</label>
                                        <input type="mail" name="email" id="email" class="form-control" value="<?= $target_staff->email ?>" required>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="tel" name="phone_number" id="phone_number" class="form-control" value="<?= $target_staff->phoneNumber ?>" required>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" value="">
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="">
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="department_id">Department</label>
                                        <select name="department_id" id="department_id" class="form-select">
                                            <option disabled selected>select any</option>
                                            <?php foreach (Department::getAll($db) as $dept) : ?>
                                                <option value="<?= $dept->id ?>" <?= $target_staff->department->id == $dept->id ? "selected" : "" ?>><?= $dept->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="user_photo">Choose Photo</label>
                                        <input type="file" name="user_photo" id="user_photo" class="form-control">
                                    </div>
                                </div>
                                <br>

                                <input type="submit" value="Update" class="btn primary-color text-white float-end">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>