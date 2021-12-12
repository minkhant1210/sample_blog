<?php

include 'core/auth.php';
include "core/base.php";
include 'core/functions.php';

$id = $_GET['id'];

if (categoryDelete($id)){
    redirect("category_add.php");
}