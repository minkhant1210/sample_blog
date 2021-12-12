<div class="nav-menu">
    <ul class="nav-group">
        <li class="nav-header">
            <p>Manage items</p>
        </li>
        <li class="nav-item active-list">
            <a href="<?php echo $url ?>/dashboard.php" class="nav-link"><i class="feather-home mr-1"></i>Dash Board</a>
        </li>
        <li class="nav-item active-list">
            <a href="<?php echo $url ?>/wallet.php" class="nav-link"><i class="feather-dollar-sign mr-1"></i>Wallet</a>
        </li>
        <li class="nav-header">
            <p>Manage posts</p>
        </li>
        <li class="nav-item active-list">
            <a href="<?php echo $url ?>/index.php" class="nav-link"><i class="feather-arrow-left mr-1"></i>Posts</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo $url ?>/post_add.php" class="nav-link"><i class="feather-plus-circle mr-1"></i>Add Post</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo $url?>/post_list.php" class="nav-link d-flex justify-content-between align-items-center">
                <span><i class="feather-list mr-1"></i>Post List</span>
                <span class="badge badge-warning badge-pill shadow-lg d-block p-2 text-black-50">
                    <?php echo countTotal("posts")['COUNT(id)'] ?>
                </span>
            </a>
        </li>
        <?php if ($_SESSION['user']['role'] <=1 ){ ?>
<!--        <li class="nav-spacer p-4"></li>-->
        <li class="nav-header">
            <p>Settings</p>
        </li>
        <li class="nav-item active-list">
            <a href="<?php echo $url ?>/category_add.php" class="nav-link d-flex justify-content-between align-items-center">
                <span><i class="feather-layers mr-2 dfl"></i>Add Category</span>
                <span class="badge badge-warning badge-pill shadow-lg d-block p-2 text-danger">
                    <?php echo countTotal("categories")['COUNT(id)'] ?>
                </span>
            </a>
        </li>
            <li class="nav-item active-list">
                <a href="<?php echo $url ?>/ads_add.php" class="nav-link d-flex justify-content-between align-items-center">
                    <span><i class="feather-zap mr-2 dfl"></i>Add Ads</span>
                    <span class="badge badge-warning badge-pill shadow-lg d-block p-2 text-danger">
                    <?php echo countTotal("ads")['COUNT(id)'] ?>
                    </span>
                </a>
            </li>

        <?php if ($_SESSION['user']['role'] == 0){ ?>
        <li class="nav-item active-list">
            <a href="<?php echo $url ?>/user_list.php" class="nav-link d-flex justify-content-between align-items-center">
                <span><i class="feather-users mr-2 dfl"></i>Users</span>
                <span class="badge badge-warning badge-pill shadow-lg d-block p-2 text-danger">
                    <?php echo countTotal("users")['COUNT(id)'] ?>
                </span>
            </a>
        </li>
            <?php } ?>
        <?php } ?>
        <!--                    <li class="nav-spacer p-4"></li>-->
        <li class="nav-item">
            <a href="<?php echo $url ?>/logout.php" class="btn btn-outline-danger w-100"><i class="feather-log-out mr-2"></i>Log out</a>
        </li>

    </ul>
</div>
