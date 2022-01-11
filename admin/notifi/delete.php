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
$sql = "delete from notifi where id='$id'";
mysqli_query($connect,$sql);
$_SESSION['success'] = "Xoá thông báo thành công !!!";
header('location:index.php');

mysqli_close($connect);