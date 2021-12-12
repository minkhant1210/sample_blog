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
            <a href="<?php echo $url?>/index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id'])? '' : 'active' ?>" aria-current="true">
                All Categories
            </a>
            <?php foreach (fCategories() as $c){ ?>
                <a class="list-group-item list-group-item-action <?php echo isset($_GET['category_id'])? ($_GET['category_id'] == $c['id']? 'active' : '') : '' ?>"
                   href="<?php echo $url ?>/category_base_post.php?category_id=<?php echo $c['id'] ?>">
                    <i class="<?php echo $c['ordering']==1? 'feather-paperclip' : '' ; ?>"></i>
                    <?php echo $c['title'] ;?>
                </a>
            <?php } ?>
        </div>
        <div class="mb-5">
            <h4>Search By Date</h4>
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo $url?>/search_by_date.php" method="post">
                        <div class="form-group">
                            <label for="start">Start Date</label>
                            <input type="date" name="start" class="form-control mb-2" id="start" required>
                            <label for="end">End Date</label>
                            <input type="date" name="end" class="form-control" id="end" required>
                        </div>
                        <button class="btn btn-outline-primary btn-sm">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
