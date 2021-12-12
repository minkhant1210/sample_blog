<?php
require_once "core/base.php";
require_once "core/functions.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sample Blog</title>
    <link rel="stylesheet" href="<?php echo $url ?>/assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/vendor/animate_it/animate.css">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/css/style.css">
</head>
<body style="background: var(--primary-soft)">

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-6">
            <div class="card">
                <div class="card-body rounded">
                    <?php
                    if (isset($_POST['loginBtn'])){
                        echo login();
                    }
                    ?>
                    <form action="" method="post">
                        <h4 class="text-center text-primary">
                            <i class="feather-log-in"></i>
                            Log In
                        </h4>
                        <hr>
                        <div class="form-group">
                            <label for="email">
                                <i class="feather-mail text-primary"></i>
                                Your Email
                            </label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">
                                <i class="feather-lock text-primary"></i>
                                Password
                            </label>
                            <input type="password" min="6" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="form-group mb-0 mt-4 text-right">
                            <button class="btn btn-primary" name="loginBtn">Sign In</button>
                            <a href="register.php" class="btn btn-outline-primary">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo $url ?>/assets/vendor/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="<?php echo $url ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $url ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url ?>/assets/vendor/way_point/jquery.waypoints.js"></script>
<script src="<?php echo $url ?>/assets/js/app.js"></script>
</body>
</html>