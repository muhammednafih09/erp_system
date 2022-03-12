<?php
session_start();
$root_path = "..";
$page_name = "student";


require_once "$root_path/models/MyDB.php";
require_once "$root_path/models/User.php";

if (!User::isUserLoggedIn()) {
    header("location:$root_path/user/login.php");
}

$db = new MyDB();
$loggedIn_user = User::getUserFromSession();
?>

<html lang="en">

<head>
    <?php require_once "$root_path/components/head.php"; ?>
    <title>Add Student</title>
</head>

<body>
    <?php require_once "$root_path/components/side_bar.php"; ?>
    <div class="container">
        <div class="main-content">
            <div class="" style="padding-top: 65px;">
                <div class="container-fluid p-2">
                    <div class="card p-4 secondary-color">
                        <?php if (array_key_exists("msg", $_GET)) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_GET["msg"] ?>
                            </div>
                        <?php endif ?>
                        <div class="card-title text-center">
                            <h4>Add Student</h4>
                        </div>
                        <div class="card-body">
                            <form action="add_student_handler.php" name="" method="post" id="add_student_form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="firstname" id="firstname" class="form-control" required>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control" required>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="tel" name="phone_number" id="phone_number" class="form-control" required>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="department_id">Department</label>
                                        <select name="department_id" id="department_id" class="form-select" required>
                                            <option disabled selected value="">select any</option>
                                            <?php foreach (Department::getAll($db) as $dept) : ?>
                                                <option value="<?= $dept->id ?>"><?= $dept->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-12 col-md-6">
                                        <label for="user_photo">Choose Photo</label>
                                        <input type="file" name="user_photo" id="user_photo" class="form-control" required>
                                    </div>
                                </div>
                                <br>

                                <input type="submit" value="Create" class="btn primary-color text-white float-end">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const myform = $("#add_student_form");
        myform.on("submit", function(e) {
            e.preventDefault();
            const pass = $("#password").val();
            const conpass = $("#confirm_password").val();
            const phoneNumber = $("#phone_number").val();
            const Regex = /[0-9 -()+]+$/;

            if (pass != conpass) {
                alert("password is not same");
            } else if (phoneNumber.length < 10 || phoneNumber.length > 13 || !Regex.test(phoneNumber)){
                alert('Please enter a valid phone number!');
                return false;
            } else {
                // debugger;
                myform[0].submit();
            }
        });
    </script>
</body>

</html>