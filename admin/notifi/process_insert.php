<?php
session_start();
require_once '../check_super_admin.php';
if(empty($_POST['detail'])){
    $_SESSION['error'] = "Bạn nhập thiếu mô tả thông báo rồi !!!";
    header('location:insert.php');
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
$sql = "select * from notifi where detail = '$detail'";
$result = mysqli_query($connect,$sql);
$num_rows = mysqli_num_rows($result);
if($num_rows==1){
    $_SESSION['error'] = "Lỗi thêm thông báo vì thông báo đã tồn tại";
    header('location:insert.php');
    exit;
}

$name = $_SESSION['name'];
$photos = $_SESSION['photos'];

$sql = "insert into notifi (detail,pin,name,photos) value('$detail','$pin','$name','$photos')";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if($error){
    echo mysqli_error($connect);
    die();
}
$_SESSION['success'] = "Thêm thông báo thành công !!!";
header('location:index.php');
mysqli_close($connect);