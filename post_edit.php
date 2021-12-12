<?php include "core/auth.php"; ?>
<?php include "template/header.php"?>

<!-- Breadcrumb Start -->
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/post_list.php">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit posts</li>
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
                                <i class="feather-plus-circle text-primary mr-1"></i>Update posts
                            </h4>
                            <div class="">
                                <a class="btn btn-sm btn-outline-primary" href="<?php echo $url; ?>/post_list.php"><i class="feather-list"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Items End -->
                <hr>
                <!-- Form Start -->
                <?php
                $id = $_GET['id'];
                $current = post($id);

                if (isset($_POST['updatePost'])){
                    if (postUpdate()){
                        linkTo('post_list.php');
                    }
                }

                ?>
                <form action="#" method="POST">
                    <input type="hidden" name="id" value="<?php echo $current['id']; ?>">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="<?php echo $current['title']?>" autofocus required>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="categoryId">Select Category</label>
                                <select name="category_id" id="categoryId" class="custom-select">
                                    <?php foreach (categories() as $c){ ?>
                                        <option value="<?php echo $c['id'];?>" <?php echo $c['id'] == $current['category_id']? "selected": "" ?> ><?php echo $c['title'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-10">
                            <div class="form-group">
                                <label for="description">Post description</label>
                                <textarea name="description" id="description"  cols="" rows="15" class="form-control"><?php echo $current['description'];?></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button name="updatePost" class="btn btn-primary d-flex justify-content-center align-items-center float-right">
                        <i class="feather-plus-circle mr-1"></i> Update Posts
                    </button>
                </form>
                <!-- Form End -->

            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
