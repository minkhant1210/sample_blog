<?php include "core/auth.php" ?>
<?php include "core/isEditor&Admin.php"; ?>
<?php include "template/header.php"?>

<!-- Breadcrumb Start -->
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <!-- Add Items Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">
                                <i class="feather-layers text-primary mr-1"></i>Category Manager
                            </h4>
                            <div class="">
                                <a class="btn btn-sm btn-outline-primary" href="<?php echo $url; ?>/category_add.php"><i class="feather-list"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Items End -->
                <hr>
                <!-- Form Start -->
                <?php

                if (isset($_POST['addCat'])){
                    categoryAdd();
                }

                ?>
                <form method="post">
                    <div class="form-inline">
                        <input type="text" class="form-control mr-2" autofocus name="title">
                        <button class="btn form-control btn-primary" name="addCat">Add Category</button>
                    </div>
                </form>
                <?php include "category_list.php"?>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
