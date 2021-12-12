<?php require_once "front_panel/head.php"?>
<title>Home</title>
<?php require_once "front_panel/side_header.php"?>

<?php $id = $_GET['category_id'];?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb mb-4">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo category($id)['title'] ?></li>
                </ol>
            </nav>
            <div class="">
                <?php foreach (catFilter($id) as $p){ ?>
                    <?php include "single_post.php"?>
                <?php } ?>
            </div>
        </div>
        <?php require_once "front_panel/right_sidebar.php";?>
    </div>
</div>

<?php require_once "front_panel/footer.php"?>







