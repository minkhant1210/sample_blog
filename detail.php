<?php session_start(); ?>
<?php require_once "front_panel/head.php"?>
<title>Home</title>
<?php require_once "front_panel/side_header.php"?>
<?php
$id = $_GET['id'];
$current = post($id);
$currentCat = $current['category_id'];

if (isset($_SESSION['user']['id'])){
    $userId = $_SESSION['user']['id'];
} else {
    $userId = 0;
}

viewerRecord($userId, $id, $_SERVER['HTTP_USER_AGENT']);
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb mb-4">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Post</li>
                </ol>
            </nav>
            <div class="">
                <div class="card border-0 shadow-sm mb-4 rounded">
                    <div class="card-body">
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
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach (fPostByCat($currentCat,2,$id) as $p){ ?>
                    <div class="col-12 col-md-6">
                        <div class="card border-0 shadow-sm mb-4 rounded">
                            <div class="card-body">
                                <a href="<?php echo $url;?>/detail.php?id=<?php echo $p['id']; ?>" class="text-primary">
                                    <h4 class="mb-1">
                                        <?php echo $p['title'];?>
                                    </h4>
                                </a>
                                <div class="mb-2">
                                    <i class="feather-user text-primary"></i>
                                    <small class="mr-2 text-black-50"><?php echo user($p['user_id'])['name'];?></small>
                                    <i class="feather-layers text-warning"></i>
                                    <small class="mr-2 text-black-50"><?php echo category($p['category_id'])['title'];?></small>
                                    <i class="feather-calendar text-secondary"></i>
                                    <small class="text-black-50"><?php echo date("d M y", strtotime($p['created_at'])) ?></small>
                                </div>
                                <p class="text-black-50">
                                    <?php echo short(showDescription($p['description']),300)?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
<!--        --><?php //require_once "front_panel/right_sidebar.php";?>
        <div class="col-12 col-md-4">
            <div class="front-panel-right-side">
                <div class="card mb-4 border-0 shadow">
                    <div class="card-body">
                        <?php if (isset($_SESSION['user']['id'])){ ?>
                            <p>Hi! <b><?php echo $_SESSION['user']['name'] ?></b></p>
                            <a href="<?php echo $url ?>/dashboard.php" class="btn btn-primary btn-sm">Go to Dashboard <i class="feather-arrow-right"></i></a>
                        <?php } else { ?>
                            <p>Hi! <b>Guest</b></p>
                            <a href="<?php echo $url ?>/register.php" class="btn btn-primary btn-sm">Register Here</a>
                        <?php } ?>
                    </div>
                </div>
                <h4>Category</h4>
                <div class="list-group mb-4">
                    <a aria-current="true"
                       class="list-group-item list-group-item-action"
                       href="<?php echo $url?>/index.php">
                        All Categories
                    </a>
                    <?php foreach (fCategories() as $c){ ?>
                        <a class="list-group-item list-group-item-action <?php echo $c['id']==$currentCat? 'active' : '' ?>"
                           href="<?php echo $url ?>/category_base_post.php?category_id=<?php echo $c['id'] ?>">
                            <?php echo $c['title'] ;?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?php require_once "front_panel/footer.php"?>







