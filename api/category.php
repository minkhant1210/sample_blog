<?php

header("Content-Type: application/json; charset=UTF-8");
require_once "../core/base.php";
require_once "../core/functions.php";

$sql = "SELECT * FROM categories WHERE 1";

if (isset($_GET['id'])){
    $id = textfilter($_GET['id']);
    $sql .= " AND id=$id";
}

if (isset($_GET['limit'])){
    $limit = textfilter($_GET['limit']);
    $sql .= " LIMIT $limit";
}

if (isset($_GET['offset'])){
    $offset = textfilter($_GET['offset']);
    $sql .= " OFFSET $offset";
}

$rows = [];
$query = mysqli_query(con(),$sql);
while ($row = mysqli_fetch_assoc($query)){
    $arr = [
        "id" => $row['id'],
        "title" => $row['title'],
        "user" => user($row['user_id'])['name'],
        "created_at" => showTime($row['created_at']),
    ];
    array_push($rows,$arr);
}
apiOutput($rows);
