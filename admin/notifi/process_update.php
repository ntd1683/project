<?php
session_start();
require_once '../check_super_admin.php';
if(empty($_POST['id'])){
    $_SESSION['error'] = "Tính năng bị lỗi vui lòng thử lại sau !!!";
    header('location:index.php');
    exit;
}
$id = $_POST['id'];
if(empty($_POST['detail'])){
    $_SESSION['error'] = "Bạn nhập thiếu mô tả thông báo rồi !!!";
    header("location:update.php?id='$id'");
    exit;
}
$detail = addslashes($_POST['detail']);
if(isset($_POST['pin'])){
    $pin = '1';
}
else{
    $pin = '0';
}

require_once '../connect.php';

$sql = "update notifi set detail = '$detail',pin='$pin' where id='$id'";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if($error){
    echo mysqli_error($connect);
    die();
}
$_SESSION['success'] = "Thêm thông báo thành công !!!";
header('location:index.php');
mysqli_close($connect);