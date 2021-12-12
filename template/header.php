<?php require_once "core/base.php";?>
<?php require_once "core/functions.php"?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo $url ?>/assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/vendor/animate_it/animate.css">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/vendor/data_table/dataTables.bootstrap4.min.css">
<!--    <link rel="stylesheet" href="--><?php //echo $url ?><!--/assets/vendor/summer_note/summernote.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/css/style.css">
</head>
<body>
<section class="container-fluid">
    <div class="row">
        <!-- SideBar Start -->
        <div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar py-3 mt-3">
            <div class="d-flex justify-content-between align-items-center brand-title">
                <div class="d-flex align-items-center">
                    <i class="feather-shopping-cart bg-primary text-white p-2 rounded mr-2"></i>
                    <span class="font-weight-bolder h4 mb-0 text-primary">MY SHOP</span>
                </div>
                <button class="hide-sidebar-btn  btn btn-primary btn-sm rounded text-white d-block d-lg-none">
                    <i class="feather-x text-black" style="font-size:1.5rem;"></i>
                </button>
            </div>
            <?php include "sidebar.php";?>
        </div>
        <!-- Content Start -->
        <div class="col-12 col-lg-9 col-xl-10 vh-100 py-3 content">
            <!-- Content_Header Start -->
            <div class="row header mb-4">
                <div class="col-12">
                    <div class="bg-primary p-2 rounded d-flex justify-content-between align-items-center">
                        <button class="show-sidebar-btn btn btn-primary d-block d-lg-none text-center">
                            <i class="feather-menu text-light" style="font-size: 1.5rem;"></i>
                        </button>

                        <form action="" method="post" class="d-none d-md-block">
                            <div class="form-inline">
                                <input type="text" class="form-control mr-2" placeholder="Search...">
                                <button class="btn btn-light">
                                    <i class="feather-search text-primary"></i>
                                </button>
                            </div>
                        </form>

                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle p-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo $url ?>/assets/img/<?php echo $_SESSION['user']['photo'] ?>" class="" width="25px" alt="">
                                <?php echo $_SESSION['user']['name'] ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <hr>
                                <a class="dropdown-item text-danger" href="<?php echo $url ?>/logout.php">Log out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content_Header End -->