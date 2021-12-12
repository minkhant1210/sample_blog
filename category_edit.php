<?php include "core/auth.php" ?>
<?php include "template/header.php"?>

<!-- Breadcrumb Start -->
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category Edit</li>
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
                                <i class="feather-layers text-primary mr-1"></i>Category Edit
                            </h4>
                            <div class="">
                                <a class="btn btn-sm btn-outline-primary" href="<?php echo $url; ?>/item_list.php"><i class="feather-list"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Items End -->
                <hr>
                <!-- Form Start -->
                <?php
                $id = $_GET['id'];
                $current = category($id);

                if (isset($_POST['updateCat'])){
                    if (categoryUpdate()){
                        linkTo("category_add.php");
                    }
                }

                ?>
                <form method="post">
                    <div class="form-inline">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="text" class="form-control mr-2" name="title" autofocus value="<?php echo $current['title'] ?>">
                        <button class="btn form-control btn-primary" name="updateCat">Update Category</button>
                    </div>
                </form>
                <?php include "category_list.php"; ?>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
