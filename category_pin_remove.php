<?php require_once "core/auth.php";?>
<?php require_once "core/base.php";?>
<?php require_once "core/functions.php";?>

<?php
if (categoryPinRemove()){
    redirect("category_add.php");
}
?>
