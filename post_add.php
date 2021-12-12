<?php include "core/auth.php"; ?>
<?php include "template/header.php"?>

<!-- Breadcrumb Start -->
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/post_list.php">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add posts</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->
<?php

if (isset($_POST['addPost'])){
    postAdd();
}

?>
<form class="row" method="post">
    <div class="col-12 col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <!-- Add Items Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">
                                <i class="feather-plus-circle text-primary mr-1"></i>Add posts
                            </h4>
                            <div class="">
                                <a class="btn btn-sm btn-outline-primary" href="<?php echo $url; ?>/post_list.php"><i class="feather-list"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Items End -->
                <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="description">Post description</label>
                                <textarea name="description" id="description" cols="" rows="15" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">
                                <i class="feather-layers text-primary mr-1"></i>Select Category
                            </h4>
                            <div class="">
                                <a class="btn btn-sm btn-outline-primary" href="<?php echo $url; ?>/category_list.php"><i class="feather-list"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-12">
                    <div class="form-group">
                        <label for="categoryId">Select Category</label>
                            <?php foreach (categories() as $c){ ?>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio<?php echo $c['id']; ?>" value="<?php echo $c['id']; ?>" name="category_id" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio<?php echo $c['id']; ?>"><?php echo $c['title']; ?></label>
                                </div>
                            <?php } ?>
                    </div>
                    <hr>
                    <button name="addPost" class="btn btn-primary d-flex justify-content-center align-items-center float-right">
                        <i class="feather-plus-circle mr-1"></i> Add Posts
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include "template/footer.php"; ?>
<script>
    $("#description").summernote({
        placeholder: 'Post description',
        tabsize: 2,
        height: 500,

    });
</script>