<?php include "core/auth.php"; ?>
<?php include "template/header.php"?>

<?php

$id = $_GET['id'];
//$id = $_GET['category_id'];
$current = post($id);

?>
<!-- Breadcrumb Start -->
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_list.php">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $current['title'] ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="row">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card mb-4">
            <div class="card-body">
                <!-- Add Items Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">
                                <i class="feather-info text-primary mr-1"></i>Post Details
                            </h4>
                            <div class="">
                                <a class="btn btn-sm btn-outline-primary" href="<?php echo $url; ?>/post_add.php"><i class="feather-plus-circle"></i></a>
                                <a class="btn btn-sm btn-outline-primary" href="<?php echo $url; ?>/post_list.php"><i class="feather-list"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Items End -->
                <hr>
                <!-- post details Start -->
                <h3>
                    <b><?php echo $current['title'] ?></b>
                </h3>
                <div>
                    <i class="feather-user text-primary"></i>
                    <small class="mr-2"><?php echo user($current['user_id'])['name'];?></small>
                    <i class="feather-layers text-warning"></i>
                    <small class="mr-2"><?php echo category($current['category_id'])['title'];?></small>
                    <i class="feather-calendar text-secondary"></i>
                    <small><?php echo date("d M y", strtotime($current['created_at'])) ?></small>
                </div>
                <p>
                    <?php echo html_entity_decode($current['description'])?>
                </p>
                <!-- post details End -->

            </div>
        </div>
    </div>
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">
                <!-- Add Items Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">
                                <i class="feather-users text-primary mr-1"></i>Viewers
                            </h4>
                            <div class="">
                                <a class="btn btn-sm btn-outline-primary" id="full-page-btn" href="#"><i class="feather-maximize-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Items End -->
                <hr>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Viewers</th>
                            <th class="text-center">Devices</th>
                            <th class="text-nowrap">View At :</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php foreach (viewerCountByPost($id) as $v){ ?>
                            <tr>
                                <td class="text-nowrap">
                                    <?php
                                    if ($v['user_id'] == 0 ){
                                        echo "guest";
                                    } else {
                                        echo user($v['user_id'])['name'];
                                    }
                                    ?>
                                </td>
                                <td><?php echo $v['device'];?></td>
                                <td class="text-nowrap"><?php echo showTime($v['created_at']) ?></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
<script>
    $(".table").dataTable({
        "order": [[ 0, "desc" ]]
    } );
</script>

