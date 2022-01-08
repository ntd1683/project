<?php
session_start();
if(empty($_POST['name'])){
    $_SESSION['error'] = "Bạn nhập thiếu tên thể loại rồi !!!";
    header('location:insert.php');
    exit;
}

require_once '../connect.php';
$name = addslashes($_POST['name']);
$sql = "select * from categorys where name = '$name'";
$result = mysqli_query($connect,$sql);
$num_rows = mysqli_num_rows($result);
if($num_rows==1){
    $_SESSION['error'] = "Lỗi thêm thể loại vì thể loại đã tồn tại";
    header('location:insert.php');
    exit;
}

$sql = "insert into categorys (name) value('$name')";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if($error){
    echo mysqli_error($connect);
    die();
}
$_SESSION['success'] = "Thêm thể loại thành công !!!";
header('location:index.php');