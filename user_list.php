<?php include "core/auth.php"; ?>
<?php include "core/isAdmin.php"; ?>
<?php include "template/header.php"?>

<!-- Breadcrumb Start -->
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                                <i class="feather-users text-primary mr-1"></i>Users Lists
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
                <table class="mt-3 mb-0 table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Control</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach(users() as $c){
                        ?>
                        <tr>
                            <td><?php echo $c['id'] ?></td>
                            <td><?php echo $c['name']?></td>
                            <td><?php echo $c['email']?></td>
                            <td><?php echo $role[$c['role']]?></td>
                            <td>
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
        // "order": [[ 0, "desc" ]]
    } );
</script>
