<?php include "core/auth.php"; ?>
<?php include "template/header.php"?>

<!-- Breadcrumb Start -->
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Posts</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <!-- Add Items Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">
                                <i class="feather-list text-primary mr-1"></i>Post Lists
                            </h4>
                            <div class="">
                                <a class="btn btn-sm btn-outline-primary" href="<?php echo $url; ?>/post_add.php"><i class="feather-plus-circle"></i></a>
                                <a class="btn btn-sm btn-outline-primary" id="full-page-btn" href="#"><i class="feather-maximize-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Items End -->
                <hr>
                <!-- Table Start -->
<!--                --><?php //echo strip_tags(html_entity_decode("<h1>Hello</h1>") )?>
                <?php echo showDescription("<h1>Hello</h1>")?>
                <table class="mt-3 mb-0 table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <?php if ($_SESSION['user']['role'] == 0){ ?>
                            <th>User</th>
                        <?php } ?>
                        <th>Viewers</th>
                        <th>Control</th>
                        <th class="text-nowrap">Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach(posts() as $c){
                        ?>
                        <tr>
                            <td><?php echo $c['id'] ?></td>
                            <td><?php echo short($c['title'])?></td>
                            <td><?php echo short(showDescription($c['description']))?></td>
                            <td class="text-nowrap"><?php echo category($c['category_id'])['title']?></td>
                            <!--                                    <td>--><?php //echo $_SESSION['user']['name']?><!--</td>-->
                            <?php if ($_SESSION['user']['role'] == 0){ ?>
                                <td class="text-nowrap"><?php echo user($c['user_id'])['name']?></td>
                            <?php } ?>
                            <td><?php echo count(viewerCountByPost($c['id'])); ?></td>
                            <td class="text-nowrap">
                                <a href="post_detail.php?id=<?php echo $c['id']?>" class="btn btn-outline-info btn-sm"><i class="feather-info"></i></a>
                                <a href="post_delete.php?id=<?php echo $c['id']?>" class="btn btn-outline-danger btn-sm"><i class="feather-trash"></i></a>
                                <a href="post_edit.php?id=<?php echo $c['id']?>" class="btn btn-outline-warning btn-sm"><i class="feather-edit"></i></a>
                            </td>
                            <td><?php echo showTime($c['created_at']) ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <!-- Table End -->

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

