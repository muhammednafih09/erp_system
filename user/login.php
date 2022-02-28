<?php $root_path = "../"; ?>

<html lang="en">

<head>
    <?php require "../components/head.php"; ?>
    <title>Login</title>
</head>

<body>

    <div class="container-sm">
        <div class="card form-card">
            <div class="row">
                <div class="d-none d-md-block col-md-4">
                    <img src="<?= $root_path ?>assets/images/icampus.png" alt="">
                </div>
                <div class="col-md-8 col-sm-12 p-5">
                    <h4 class="card-title text-white">Login</h4>
                    <hr class="text-white-50">
                    <form action="login_handler.php" method="post">
                        <div class="form-group text-white">
                            <label for="email">email</label>
                            <input class="form-control no-border mt-1" type="email" name="email" id="email" autocomplete="off" placeholder="email">

                            <label class="mt-2" for="password">password</label>
                            <input type="password" name="password" id="password" class="form-control no-border mt-1" autocomplete="off" placeholder="password">
                            <br>

                            <a href="" class="text-white-50 text-decoration-none">Forgot Password?</a>
                            <input type="submit" value="LOGIN" class="btn btn-light float-end text-bold">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>