<?php
// User::getUserTypeFromSession() != "staff"

// var_dump($user);

?>
<div class="d-flex flex-column flex-shrink-0 p-3 pt-5 secondary-color side-bar d-none d-sm-block">
    <nav class="navbar fixed-top navbar-light primary-color p-2 float-start">
        <a class="navbar-brand text-white" href="<?= $root_path ?>/index.php ?>">icampus</a>

        <div class="input-group">
            <input type="search" class="form-control search-bar">
            <button type="button" class="btn text-white p-0">
                <i class="fa-solid fa-magnifying-glass px-2 pt-2"></i>
            </button>
        </div>

        <div class="profile p-1 m-0 dropdown">
            <a href="<?= $root_path ?>/user/profile.php">
                <img class="profile-photo p-3 img-profile" src="<?= $root_path ?>/assets/images/users/<?= $loggedIn_user->getProfilePicUrl() ?>" alt="profile_photo">
            </a>
            <div class="dropdown-content primary-color">
                <a href="<?= $root_path ?>/user/profile.php" style="text-decoration: none;">
                    <i class="fa-solid fa-user"></i>
                    <span>Profile</span>
                </a>
                <br>

                <a href="<?= $root_path ?>/common/error_503.php" style="text-decoration: none;">
                    <i class="fa-solid fa-gear"></i>
                    <span>Settings</span>
                </a>
                <br>

                <a href="<?= $root_path ?>/user/logout.php" style="text-decoration: none;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>

    </nav>
    <!-- <hr> -->
    <ul class="nav nav-pills flex-column mb-auto mt-4">
        <li class="nav-item">
            <a href="<?= $root_path ?>/dashboard/index.php" class="nav-link <?= $page_name == "dashboard" ? "active" : "link-dark" ?>">
                <i class="fa-solid fa-gauge"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <hr>
        <li class="nav-item">
            <a href="<?= $root_path ?>/user/profile.php" class="nav-link <?= $page_name == "profile" ? "active" : "link-dark" ?>">
                <i class="fa-solid fa-user"></i>
                <span>Profile</span>
            </a>
        </li>
        <hr>
        <?php if($loggedIn_user->userType == "staff"): ?>
        <li>
            <a href="<?= $root_path ?>/staff/index.php" class="nav-link <?= $page_name == "staff" ? "active" : "link-dark" ?>">
                <i class="fa-solid fa-chalkboard-user"></i>
                <span>Staff</span>
            </a>
        </li>
        <hr>
        <li>
            <a href="<?= $root_path ?>/student/index.php" class="nav-link <?= $page_name == "student" ? "active" : "link-dark" ?>">
                <i class="fa-solid fa-graduation-cap"></i>
                <span>Student</span>
            </a>
        </li>
        <hr>

        <?php endif ?>

        <li>
            <a href="<?= $root_path ?>/common/error_503.php" class="nav-link link-dark">
                <i class="fa-solid fa-list-check"></i>
                <span>Attendance</span>
            </a>
        </li>
        <hr>

        <li>
            <a href="<?= $root_path ?>/common/error_503.php" class="nav-link link-dark">
                <i class="fa-solid fa-coins"></i>
                <span>Account</span>
            </a>
        </li>
        <hr>

        <li>
            <a href="<?= $root_path ?>/common/error_503.php" class="nav-link link-dark">
                <i class="fa-solid fa-gear"></i>
                <span>Settings</span>
            </a>
        </li>
        <hr>

        <li>
            <a class="nav-link link-dark" href="<?= $root_path ?>/user/logout.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </li>
        <hr>

    </ul>
</div>

<nav class="navbar fixed-top navbar-light primary-color p-2 float-start d-block d-sm-none">
    <a class="navbar-brand text-white float-start" href="#">icampus</a>

    <div class="profile p-1 m-0">
        <a href="">
            <img class="profile-photo p-3 img-profile float-end" src="<?= $root_path ?>/assets/images/profile-dummy.png" alt="profile_photo">
        </a>
    </div>
</nav>