<?php
session_start();
$root_path = "..";
$page_name = "profile";


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
    <title>Profile</title>
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
                                        <img src="<?= $root_path ?>/assets/images/users/<?= $loggedIn_user->getProfilePicUrl() ?>" alt="" class="" style="width: 100px; height: 100px;; border-radius: 100% !important;">
                                    </div>
                                    <br><br>
            
                                    <form action="edit_profile_handler.php" name="" method="post">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <label for="firstname">First Name</label>
                                                <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $loggedIn_user->firstName ?>" required>
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <label for="lastname">Last Name</label>
                                                <input type="text" name="lastname" id="lastname" class="form-control" value="<?= $loggedIn_user->lastName ?>" required>
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <label for="email">Email</label>
                                                <input type="mail" name="email" id="email" class="form-control" value="<?= $loggedIn_user->email ?>" required>
                                            </div>

                                            <div class="col-sm-12 col-md-6">
                                                <label for="phone_number">Phone Number</label>
                                                <input type="tel" name="phone_number" id="phone_number" class="form-control" value="<?= $loggedIn_user->phoneNumber ?>" required>
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
                                                <label for="user_photo">Choose Photo</label>
                                                <input type="file" name="user_photo" id="user_photo" class="form-control">
                                            </div>

                                            <div class="col-sm-12">
                                                <br>
                                                <input type="submit" value="Update" class="btn primary-color text-white float-end">
                                            </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>

        <script>
            const myform = $("#update_profile_form");
            myform.on("submit", function(e) {
                e.preventDefault();
                const pass = $("#password").val();
                const conpass = $("#confirm_password").val();
                const phoneNumber = $("#phone_number").val();
                const Regex = /[0-9 -()+]+$/;

                if (pass != conpass) {
                    alert("password is not same");
                } else if ((phoneNumber.length <= 10) || (!Regex.test(phoneNumber))) {
                    alert('Please enter a valid phone number!');
                    return false;
                } else {
                    myform[0].submit();
                }
            });
        </script>

</body>

</html>