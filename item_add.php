<?php include "template/header.php"?>

<!-- Breadcrumb Start -->
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/item_list.php">Items</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add items</li>
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
                                <i class="feather-plus-circle text-primary mr-1"></i>Add items
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
                <form action="#" method="POST">
                    <div class="row">
                        <!-- Left Form Start -->
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="photo">Add photo</label>
                                <i class="feather-info" data-container="body" data-toggle="popover" data-placement="right" data-content="only for img/jpeg"></i>
                                <input type="file" name="photo" id="photo" class="form-control p-1" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Item Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="items-name">
                            </div>

                            <div class="form-group">
                                <label for="type">Item type</label>
                                <select name="type" id="type" class="custom-select">
                                    <option value="0">ကုန်စို</option>
                                    <option value="1">ကုန်ခြောက်</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="custom-select">
                                    <option value="" selected disabled>Select Main Category</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sub">Sub Category</label>
                                <select name="sub" id="sub" class="custom-select">
                                    <option value="" selected disabled>Select Sub Category</option>
                                </select>
                            </div>
                        </div>
                        <!-- Left Form End -->
                        <!-- Right Form Start -->
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="quantity">Item Quantity</label>
                                        <input type="text" name="quantity" id="quantity" class="form-control" placeholder="items-quantity">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="unit">Unit</label>
                                        <select name="unit" id="unit" class="custom-select">
                                            <option value="0">ကုန်စို</option>
                                            <option value="1">ကုန်ခြောက်</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" id="price" name="price" class="form-control" placeholder="price">
                            </div>

                            <div class="form-group">
                                <label for="des" class="d-block">Description</label>
                                <textarea name="des" id="des" cols="40" rows="8" class="form-control" placeholder="descriptions"></textarea>
                            </div>
                        </div>
                        <!-- Right Form End -->
                    </div>
                </form>
                <!-- Form End -->
                <hr>
                <button class="btn btn-primary d-flex justify-content-center align-items-center float-right">
                    <i class="feather-plus-circle mr-1"></i> Add Items
                </button>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
