<?php include "core/auth.php" ?>
<?php include "core/isEditor&Admin.php"; ?>
<?php include "template/header.php"?>

<!-- Breadcrumb Start -->
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Advertisements</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <!-- Add Items Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">
                                <i class="feather-zap text-primary mr-1"></i>Ads Manager
                            </h4>
                            <div class="">
                                <a class="btn btn-sm btn-outline-primary" id="full-page-btn" href="#"><i class="feather-maximize-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Items End -->
                <hr>
                <!-- Form Start -->
                <?php
                if (isset($_POST['addAds'])){
                    print_r(adsAdd());
                }

                ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="owner_name">Owner Name</label>
                                <input type="text" name="owner_name" class="form-control" id="owner_name" placeholder="ads owner name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="photo">Add photo link(GIF)</label>
                                <input type="text" name="photo" class="form-control" id="photo" placeholder="photos or gifs">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="link">Website link</label>
                                <input type="text" name="link" class="form-control" id="link" placeholder="URL">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="start">Start Date</label>
                                <input type="date" name="start" class="form-control" id="start">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="end">End Date</label>
                                <input type="date" name="end" class="form-control" id="end">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button name="addAds" class="btn btn-primary d-flex justify-content-center align-items-center float-right">
                        <i class="feather-zap mr-1"></i> Add Ads
                    </button>
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <!-- Add Items Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">
                                <i class="feather-list text-primary mr-1"></i>Ads List
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- Add Items End -->
                <hr>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Owner Name</th>
                            <th>Website Link</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (ads() as $c){ ?>
                            <tr>
                                <td><?php echo $c['owner_name'] ?></td>
                                <td><a target="_blank" href="<?php echo $c['link'] ?>"><?php echo short($c['link'],20) ?></a></td>
                                <td class="text-nowrap"><?php echo $c['start'] ?></td>
                                <td class="text-nowrap"><?php echo $c['end'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
