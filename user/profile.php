<?php
$root_path = '..';
$page_name = "profile";

require_once "../models/MyDB.php";
require_once "../models/User.php";

$db = new MyDB();
// User::getUserTypeFromSession() != "staff"
if(!User::isUserLoggedIn()){
    header('location:login.php');
}
$user = User::getUserFromSession();

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

                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="card p-4 secondary-color">
                                <div class="card-title text-center">
                                    <h4>Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="profile-image text-center">
                                        <img src="<?= $root_path ?>/assets/images/users/<?= $user->getProfilePicUrl() ?>" alt="" class="" style="width: 100px; border-radius: 100% !important;">
                                    </div>
                                    <br><br>

                                    <form action="add_user_handler.php" name="" method="post">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="firstname" id="firstname" class="form-control" required>
                                        <br>

                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control" required>
                                        <br>

                                        <label for="email">Email</label>
                                        <input type="mail" name="email" id="email" class="form-control" required>
                                        <br>

                                        <label for="phone_number">Phone Number</label>
                                        <input type="tel" name="phone_number" id="phone_number" class="form-control" required>
                                        <br>

                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                        <br>

                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>

                                        <!-- <span>Select User Type</span>
                                        <br><br>

                                        <input type="radio" name="user_type" id="student" class="btn-radio" value="student" required>
                                        <label for="student">Student</label>

                                        <input type="radio" name="user_type" id="staff" class="btn-radio" value="staff" required>
                                        <label for="staff">Staff</label> -->
                                        <br><br>

                                        <input type="submit" value="Create" class="btn primary-color text-white">
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>

</body>

</html>