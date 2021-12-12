<?php include "core/auth.php" ?>
<?php include "template/header.php"?>

<?php

if (isset($_POST['payNow'])){
    payNow();
}

?>

<!-- Breadcrumb Start -->
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                                <i class="feather-dollar-sign text-primary mr-1"></i>Payment
                            </h4>
                            <div class="">
                                <a class="btn btn-sm btn-outline-primary" href="#">
                                    <i class="feather-user"></i> Your Money is <?php echo user($_SESSION['user']['id'])['money'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Items End -->
                <hr>
                <!-- Form Start -->
                <form method="post">
                    <div class="form-inline">
                        <select name="to_user" id="" class="custom-select mr-2" required>
                            <option value="0" class="selected disabled">Select User</option>
                            <?php foreach (users() as $user){ ?>
                                <?php if ($user['id'] != $_SESSION['user']['id']){ ?>
                                    <option value="<?php echo $user['id'] ?>"><?php echo $user['name'];?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <input type="number" class="form-control mr-2 w-25" name="amount" min="100" max="<?php echo user($_SESSION['user']['id'])['money'] ?>" placeholder="Transfer Amount" required>
                        <input type="text" class="form-control mr-5" name="description" placeholder="Description" required>
                        <button class="btn form-control btn-primary" name="payNow">Transfer</button>
                    </div>
                </form>
                <!-- Form End -->
                <hr>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date / Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach(transitions() as $t){ ?>
                            <tr>
                                <td><?php echo $t['id'];?></td>
                                <td><?php echo user($t['from_user'])['name'];?></td>
                                <td><?php echo user($t['to_user'])['name'];?></td>
                                <td><?php echo $t['amount'];?></td>
                                <td><?php echo $t['description'];?></td>
                                <td><?php echo date("d-m-Y / h:i:s",strtotime($t['created_at']));?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
