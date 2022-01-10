<?php
session_start();
require_once '../check_super_admin.php';
if(empty($_GET['id'])){
    $_SESSION['error'] = "Xoá bị lỗi vui lòng thử lại sau !!!";
    header('location:index.php');
    exit;
}
$id = $_GET['id'];
include '../connect.php';
$sql = "select * from manufactors where id='$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
$photos = $each['photos'];
unlink("img/$photos");
$sql = "delete from manufactors where id='$id'";
mysqli_query($connect,$sql);
$_SESSION['success'] = "Xoá nhà sản xuất thành công !!!";
header('location:index.php');

mysqli_close($connect);