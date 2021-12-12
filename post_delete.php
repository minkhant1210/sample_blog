<?php

include 'core/auth.php';
include "core/base.php";
include 'core/functions.php';

$id = $_GET['id'];

if (postDelete($id)){
    redirect("post_list.php");
}