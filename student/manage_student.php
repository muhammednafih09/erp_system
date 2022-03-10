<?php
session_start();
$root_path = "..";
$page_name = "student";


require_once "$root_path/models/MyDB.php";
require_once "$root_path/models/User.php";

if(!User::isUserLoggedIn()){
    header("location:$root_path/user/login.php");
}

$db = new MyDB();
$loggedIn_user = User::getUserFromSession();

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
                    <a href="add_student.php" class="btn btn-success float-end">Add Student</a>
                    <br><br>

                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="card p-4 secondary-color">

                                <table class="table secondary-color">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Department</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (User::getAll($db) as $index=> $userObj) :
                                            if($userObj->userType != "student")
                                            continue;
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $index+1; ?></th>
                                                <td><img src="<?= $root_path ?>/assets/images/users/<?= $userObj->getProfilePicUrl() ?>" alt="" class="" style="width: 50px; height: 50px; border-radius: 100% !important;"></td>
                                                <td><?= $userObj->firstName; ?></td>
                                                <td><?= $userObj->lastName; ?></td>
                                                <td><?= $userObj->phoneNumber; ?></td>
                                                <td><?= $userObj->email; ?></td>
                                                <td><?= $userObj->department->name; ?></td>
                                                <td><a href="edit_student.php?id=<?= $userObj->id ?>" class="btn primary-color text-white">Edit</a></td>
                                                <td><a href="delete_student.php?id=<?= $userObj->id ?>" class="btn bg-danger text-white">Delete</a></td>
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