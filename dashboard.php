<?php require_once "core/auth.php";?>
<?php include "template/header.php";?>


<div class="col-12 vh-100 py-3 content">
    <!-- Content_Header Start -->

    <!-- Content_Header End -->
    <!-- Content_cards Start -->
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card mb-4 status-card" onclick="go('https://google.com')">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 align-items-center">
                            <i class="feather-heart h1 text-primary mt-1"></i>
                        </div>
                        <div class="col-8">
                            <p class="mb-2 h4 font-weight-bolder">
                                <span class="counter-up"><?php echo countTotal('viewers')['COUNT(id)'] ?></span>
                            </p>
                            <p class="mb-0 text-black-50">Total visitor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card mb-4 status-card" onclick="go('<?php echo $url;?>/post_list.php')">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 align-items-center">
                            <i class="feather-list h1 text-primary mt-1"></i>
                        </div>
                        <div class="col-8">
                            <p class="mb-2 h4 font-weight-bolder">
                                <span class="counter-up"><?php echo countTotal('posts')['COUNT(id)'] ?></span>
                            </p>
                            <p class="mb-0 text-black-50">Total Post</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card mb-4 status-card" onclick="go('<?php echo $url;?>/category_add.php')">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 align-items-center">
                            <i class="feather-layers h1 text-primary mt-1"></i>
                        </div>
                        <div class="col-8">
                            <p class="mb-2 h4 font-weight-bolder">
                                <span class="counter-up"><?php echo countTotal('categories')['COUNT(id)'] ?></span>
                            </p>
                            <p class="mb-0 text-black-50">Total Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/user_list.php')">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 align-items-center">
                            <i class="feather-users h1 text-primary mt-1"></i>
                        </div>
                        <div class="col-8">
                            <p class="mb-2 h4 font-weight-bolder">
                                <span class="counter-up"><?php echo countTotal('users')['COUNT(id)'] ?></span>
                            </p>
                            <p class="mb-0 text-black-50">Total User</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content_Cards End -->
    <!-- Content_Charts Start -->
    <div class="row align-items-end">
        <div class="col-12 col-xl-7">
            <div class="card shadow-lg mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Visitors</h4>
                        <div>
                            <img src="<?php echo $url;?>/assets/img/user/avatar1.jpg" class="rounded-circle uv-img" width="40px" alt="">
                            <img src="<?php echo $url;?>/assets/img/user/avatar2.jpg" class="rounded-circle uv-img" width="40px" alt="">
                            <img src="<?php echo $url;?>/assets/img/user/avatar3.jpg" class="rounded-circle uv-img" width="40px" alt="">
                            <img src="<?php echo $url;?>/assets/img/user/avatar4.jpg" class="rounded-circle uv-img" width="40px" alt="">
                            <img src="<?php echo $url;?>/assets/img/user/avatar5.jpg" class="rounded-circle uv-img" width="40px" alt="">
                        </div>
                    </div>
                    <canvas id="chart1" height="150"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-5">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4>Posts per Category</h4>
                        <i class="feather-pie-chart text-primary h3"></i>
                    </div>
                    <canvas id="chart2" height="215px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center p-2">
                        <h4 class="mb-0">Subscriber Lists</h4>
                        <?php
                        $currentUserId = $_SESSION['user']['id'];

                        $totalPosts = countTotal('posts')['COUNT(id)'];
                        $currentUserPosts = countTotal('posts',"user_id='$currentUserId'")['COUNT(id)'];
                        $currentUserPostPercentage = floor(($currentUserPosts/$totalPosts)*100);

                        ?>
                        <div>
                            <small>
                                Your posts: <?php echo $currentUserPosts;?> /
                                Total posts: <?php echo $totalPosts; ?>
                            </small>
                            <div class="progress" style="width: 300px; height: 5px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $currentUserPostPercentage?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
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
                        foreach(dashboardPosts('5') as $c){
                            ?>
                            <tr>
                                <td><?php echo $c['id'] ?></td>
                                <td><?php echo short($c['title'])?></td>
                                <td><?php echo short(showDescription($c['description']))?></td>
                                <td class="text-nowrap"><?php echo category($c['category_id'])['title']?></td>
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
                </div>
            </div>
        </div>
    </div>
    <!-- Content Charts End -->
</div>


<?php include "template/footer.php"; ?>
<script src="<?php echo $url ;?>/assets/vendor/way_point/jquery.waypoints.js"></script>
<script src="<?php echo $url ;?>/assets/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url ;?>/assets/vendor/chart_js/Chart.min.js"></script>
<script>
    $('.counter-up').counterUp({
        delay: 10,
        time: 1000
    });

    <?php

    $dateArr = [];
    $viewerCount = [];
    $transitionCount = [];

    $today = date("Y-m-d");
    for ($i=0; $i<10; $i++){
        $date=date_create($today);
        date_sub($date,date_interval_create_from_date_string("$i days"));
        $current = date_format($date,"Y-m-d");
        array_push($dateArr,$current);

        $result = countTotal('viewers',"CAST(created_at AS DATE) = '$current'")['COUNT(id)'];
        array_push($viewerCount,$result);

        $result2 = countTotal('transition',"CAST(created_at AS DATE) = '$current'")['COUNT(id)'];
        array_push($transitionCount,$result2);
    }



    ?>

    let dateArr = <?php echo json_encode($dateArr); ?>;
    let transitionCountArr = <?php echo json_encode($transitionCount);?>;
    let viewerCountArr = <?php echo json_encode($viewerCount); ?>;

    let ctx = document.getElementById('chart1').getContext('2d');
    let chart1 = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dateArr,
            datasets: [
                {
                    label: 'Transition Count',
                    data: transitionCountArr,
                    backgroundColor: [
                        '#28a74530',
                    ],
                    borderColor: [
                        '#28a745',
                    ],
                    borderWidth: 1,
                    tension:0
                },
                {
                    label: 'Viewers Count',
                    data: viewerCountArr,
                    backgroundColor: [
                        '#28a74530',
                    ],
                    borderColor: [
                        '#28a745',
                    ],
                    borderWidth: 1,
                    tension: 0.1
                },
            ]
        },
        options: {
            scales: {
                y: [
                    {ticks:
                            {
                                beginAtZero: true
                            }}
                ],

            },
            legend: {
                display: true,
                position: 'top',
                labels: {
                    fontColor: '#333',
                    usePointStyle: true
                }
            }
        },

    });

    <?php
    $categoryName = [];
    $postsPerCategory = [];
    foreach(categories() as $c){
        array_push($categoryName,$c['title']);
        array_push($postsPerCategory, countTotal("posts","category_id={$c['id']}")['COUNT(id)']);
    }
    ?>

    let postsArr = <?php echo json_encode($postsPerCategory);?>;
    let catArr = <?php echo json_encode($categoryName);?>;

    let op = document.getElementById('chart2').getContext('2d');
    let chart2 = new Chart(op, {
        type: 'doughnut',
        data: {
            labels: catArr,
            datasets: [{
                label: '# of Votes',
                data: postsArr,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: '#333',
                    usePointStyle: true
                }
            }
        }
    });
</script>
