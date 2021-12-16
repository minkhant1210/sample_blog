<?php

//common start
function alert($data,$color="danger"){
    return "<p class='alert alert-$color'>$data</p>";
}

function runQuery($sql){
    if (mysqli_query(con(),$sql)){
        return true;
    } else {
        die("Database ERROR: ");
    }
}

function fetch($sql) {
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function fetchAll($sql) {
    $query = mysqli_query(con(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        array_push($rows,$row);
    }
    return $rows;
}

function redirect($location) {
    header("location:$location");
}

function linkTo($location) {
    echo "<script>location.href='$location'</script>";
}

function showTime($timeStamp,$format = "d-m-y"){
    return date($format, strtotime($timeStamp));
}

function countTotal($table,$condition = 1){
    $sql = "SELECT COUNT(id) FROM $table WHERE $condition";
    return fetch($sql);
}

function short($str,$length="60"){
    return substr($str,0,$length)."...";
}
function showDescription($str){
    $str = html_entity_decode($str);
    return strip_tags($str);
}

function textfilter($text){
    $text = trim($text);
    $text = htmlentities($text,ENT_QUOTES);
    $text = stripcslashes($text);
    return $text;
}

//common end

//auth start

function register() {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password === $cpassword) {
        $spassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$spassword')";
        if (runQuery($sql)) {
            redirect("login.php");
        }
    } else {
        return alert("Password & ConfirmPassword do not match");
    }
}

function login() {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    if (!$row){
        return alert("Password or Email don't match");
    } else {
        if (!password_verify($password, $row['password'])){
            return alert("Password or Email don't match");
        } else {
            session_start();
            $_SESSION['user'] = $row;
            redirect("dashboard.php");
        }
    }
}
//auth end

//user start
function user($id){
    $sql = "SELECT * FROM users WHERE id=$id";
    return fetch($sql);
}

function users(){
    $sql = "SELECT * From users";
    return fetchAll($sql);
}
//user end

//category start

function categoryAdd() {
    $title = textfilter($_POST['title']);
//    session_start();
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO categories (title,user_id) VALUES ('$title','$user_id')";

    if (runQuery($sql)) {
        linkTo("category_add.php");
    }
}

function category($id) {
    $sql = "SELECT * FROM categories WHERE id = $id";
    return fetch($sql);
}

function categories() {
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";
    return fetchAll($sql);
}

function categoryDelete($id){
    $sql = "DELETE FROM categories WHERE id=$id";
    return runQuery($sql);
}

function categoryUpdate(){
    $title = textfilter($_POST['title']);
    $id = $_POST['id'];

    $sql = "UPDATE categories SET title='$title' WHERE id=$id";
    return runQuery($sql);
}

function categoryPinToTop($id){
    $sql = "UPDATE categories SET ordering=0";
    mysqli_query(con(),$sql);

    $sql = "UPDATE categories SET ordering=1 WHERE id=$id";
    return runQuery($sql);
}

function categoryPinRemove(){
    $sql = "UPDATE categories SET ordering=0";
    return runQuery($sql);
}
//category end

//posts start
    function postAdd() {
        $title = textfilter($_POST['title']);
        $description = textfilter($_POST['description']);
        $category_id = $_POST['category_id'];
        $user_id = $_SESSION['user']['id'];
        $sql = "INSERT INTO posts (title,description,category_id,user_id) VALUES ('$title','$description','$category_id','$user_id')";

        if (runQuery($sql)) {
            linkTo("post_list.php");
        }
    }

    function post($id) {
        $sql = "SELECT * FROM posts WHERE id = $id";
        return fetch($sql);
    }

    function posts() {
        $current_user_id = $_SESSION['user']['id'];
        if ($_SESSION['user']['role'] > 1){
            $sql= "SELECT * FROM posts WHERE user_id = '$current_user_id' ";
        }else {
            $sql = "SELECT * FROM posts";
        }
        return fetchAll($sql);
    }

    function postDelete($id){
        $sql = "DELETE FROM posts WHERE id=$id";
        return runQuery($sql);
    }

    function postUpdate(){
        $title = textfilter($_POST['title']);
        $description = textfilter($_POST['description']);
        $category_id = $_POST['category_id'];
        $id = $_POST['id'];

        $sql = "UPDATE posts SET title='$title',description='$description',category_id='$category_id' WHERE id=$id";
        return runQuery($sql);
    }
//posts end

//front panel start

    function fPosts($orderCol="id",$orderType="DESC"){
        $sql = "SELECT * FROM posts ORDER BY $orderCol $orderType";
        return fetchAll($sql);
    }
    function fCategories(){
        $sql = "SELECT * FROM categories ORDER BY ordering DESC";
        return fetchAll($sql);
    }
    function fPostByCat($category_id,$limit="99999",$post_id=0){
        $sql = "SELECT * FROM posts WHERE category_id=$category_id AND id!=$post_id ORDER BY id DESC LIMIT $limit";
        return fetchAll($sql);
    }
    function catFilter($category_id){
        $sql = "SELECT * FROM posts WHERE category_id=$category_id ORDER BY id DESC";
        return fetchAll($sql);
    }
    function fSearch($searchKey){
        $sql = "SELECT * FROM posts WHERE title LIKE '%$searchKey' OR description LIKE '%$searchKey%' ORDER BY id DESC";
        return fetchAll($sql);
    }
    function fSearchBYDate($start,$end){
        $sql = "SELECT * FROM posts WHERE created_at BETWEEN '$start' AND '$end' ORDER BY id DESC ";
        return fetchAll($sql);
    }
    //front panel end

    //viewers count start
    function viewerRecord($userId,$postId,$device){
        $sql = "INSERT INTO viewers (user_id,post_id,device) VALUES  ('$userId','$postId','$device')";
        return runQuery($sql);
    }

    function viewerCountByPost($postId){
        $sql = "SELECT * FROM viewers WHERE post_id='$postId'";
        return fetchAll($sql);
    }
    function viewerCountByUser($userId){
        $sql = "SELECT * FROM viewers WHERE post_id='$userId'";
        return fetchAll($sql);
    }
//viewers count end

//ads start
    function adsAdd() {
        $ownerName = $_POST['owner_name'];
        $photo = $_POST['photo'];
        $link = $_POST['link'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        $sql = "INSERT INTO ads (owner_name,photo,link,start,end) VALUES ('$ownerName','$photo','$link','$start','$end')";

        if (runQuery($sql)) {
            linkTo("ads_add.php");
        }
    }

    function ad($id) {
        $sql = "SELECT * FROM ads WHERE id = $id";
        return fetch($sql);
    }

    function ads() {
        $today = date("Y-m-d");
        $sql = "SELECT * FROM ads WHERE start <= '$today' AND end > '$today'";
//        die($sql);
        return fetchAll($sql);
    }
//ads end
//payment start
    function payNow(){
        $from = $_SESSION['user']['id'];
        $to = $_POST['to_user'];
        $amount = $_POST['amount'];
        $description = $_POST['description'];

        //from user money update(-)
        $fromUserDetails = user($from);
        $leftMoney = $fromUserDetails['money'] - $amount;

        if ($fromUserDetails['money'] >= $amount){
            $sql = "UPDATE users SET money=$leftMoney WHERE id=$from";
            mysqli_query(con(),$sql);

            //to user money update(+)
            $toUserDetails = user($to);
            $newAmount = $toUserDetails['money'] + $amount;
            $sql = "UPDATE users SET money=$newAmount WHERE id=$to";
            mysqli_query(con(),$sql);

//        insert into transition table
            $sql = "INSERT INTO transition (from_user,to_user,amount,description) VALUES ('$from','$to','$amount','$description')";
            runQuery($sql);
        }
    }
    function transition($id) {
        $sql = "SELECT * FROM transition WHERE id = $id";
        return fetch($sql);
    }

    function transitions() {
        $userId = $_SESSION['user']['id'];
        if ($_SESSION['user']['role'] == 0){
            $sql = "SELECT * FROM transition";
        } else {
            $sql = "SELECT * FROM transition WHERE from_user=$userId OR to_user=$userId";
        }
        return fetchAll($sql);
    }
//payment end

//dashboard start
    function dashboardPosts($limit="99999999"){
        $current_user_id = $_SESSION['user']['id'];
        if ($_SESSION['user']['role'] > 1){
            $sql= "SELECT * FROM posts WHERE user_id = '$current_user_id' ORDER BY id DESC LIMIT $limit";
        }else {
            $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit";
        }
        return fetchAll($sql);
    }
//dashboard end

//api start
function apiOutput($arr){

    echo json_encode($arr);

}
//api end