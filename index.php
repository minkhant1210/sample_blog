<?php session_start(); ?>
<?php require_once "front_panel/head.php"?>
<title>Home</title>
<?php require_once "front_panel/side_header.php"?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb mb-4">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
            </nav>
            <div class="">
                <div class="dropdown mb-4 text-right">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                        <i class="feather-calendar">Sort By</i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="?order_by=created_at&order_type=desc>
                            <i class="feather-list"></i>Default
                        </a>
                        <a class="dropdown-item" href="?order_by=created_at&order_type=asc">
                            <i class="feather-arrow-down-circle"></i>Oldest to Newest
                        </a>
                        <a class="dropdown-item" href="?order_by=created_at&order_type=desc">
                            <i class="feather-arrow-up-circle"></i>Newest to Oldest
                        </a>
                    </div>
                </div>
                <?php
                if (isset($_GET['order_by']) && isset($_GET['order_type'])){
                    $orderCol =  $_GET['order_by'];
                    $orderType = strtoupper($_GET['order_type']);
                    $posts = fPosts($orderCol,$orderType);
                }else {
                    $posts = fPosts();
                }

                ?>
                <?php foreach ($posts as $p){ ?>
                    <?php include "single_post.php"?>
                <?php } ?>
            </div>
        </div>
        <?php require_once "front_panel/right_sidebar.php";?>
    </div>
</div>

<?php require_once "front_panel/footer.php"?>







