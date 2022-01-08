<?php
session_start();
if(empty($_POST['name'])){
    $_SESSION['error'] = "Bạn nhập thiếu tên thể loại rồi !!!";
    header('location:update.php');
    exit;
}
$id = $_POST['id'];
$name = addslashes($_POST['name']);
require_once '../connect.php';
$sql = "update categorys set name='$name' where id = '$id'";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if($error){
    echo mysqli_error($connect);
    die();
}
$_SESSION['success'] = "Sửa thể loại thành công !!!";
header('location:index.php');