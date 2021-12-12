<?php
function con() {
    return mysqli_connect("localhost", "root", "", "blog");
}

$info = array(
    "name" => "sample blog",
    "short" => "sp",
    "description" => "some descriptions",
);

date_default_timezone_set('Asia/Yangon');

$role = ['Admin','Editor','User'];

$url = "http://{$_SERVER['HTTP_HOST']}/wd_6/5_sample_blog";