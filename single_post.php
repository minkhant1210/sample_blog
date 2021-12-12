<div class="card border-0 shadow-sm mb-4 rounded">
    <div class="card-body">
        <a href="<?php echo $url;?>/detail.php?id=<?php echo $p['id']; ?>" class="text-primary">
            <!--                            <a href="--><?php //echo $url;?><!--/detail.php?category_id=--><?php //echo $p['id']; ?><!--" class="text-primary">-->
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
