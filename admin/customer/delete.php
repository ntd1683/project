<?php
session_start();
if(empty($_GET['id'])){
    $_SESSION['error'] = "Xoá bị lỗi vui lòng thử lại sau !!!";
    header('location:index.php');
    exit;
}
$id = $_GET['id'];
include '../connect.php';
$sql = "select * from customers where id='$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
$photos = $each['photos'];
unlink("photos/$photos");
$sql = "delete from customers where id='$id'";
mysqli_query($connect,$sql);
$_SESSION['success'] = "Xoá khách hàng thành công !!!";
header('location:index.php');

mysqli_close($connect);