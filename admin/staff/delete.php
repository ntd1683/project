<?php
session_start();
if(empty($_GET['id'])){
    $_SESSION['error'] = "Xoá bị lỗi vui lòng thử lại sau !!!";
    header('location:index.php');
    exit;
}
$id = $_GET['id'];
include '../connect.php';
$sql = "select * from admin where id='$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
$level = $each['level'];
if($level == 1 ){
    $_SESSION['error'] = 'Bạn không có quyền xoá người này';
    header('location:index.php');
    exit;
}
$photos = $each['photos'];
unlink("photos/$photos");
$sql = "delete from admin where id='$id'";
mysqli_query($connect,$sql);
$_SESSION['success'] = "Xoá nhân viên thành công !!!";
header('location:index.php');

mysqli_close($connect);