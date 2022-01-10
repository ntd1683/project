<?php
session_start();
require_once './connect.php';
if(empty($_POST['token'])){
    $_SESSION['error'] = 'Lỗi chưa xác định , vui lòng thử lại sau';
    header('location:index.php');
    exit;
}
if(empty($_POST['password'])){
    $_SESSION['error'] = 'Lỗi chưa nhập mật khẩu vui lòng thử lại sau';
    header('location:index.php');
    exit;
}
$password = $_POST['password'];
$token = $_POST['token'];
$sql = "select id_admin from forgot_password where token ='$token'";
$result = mysqli_query($connect,$sql);
$num_rows = mysqli_num_rows($result);
if($num_rows == 0){
    $_SESSION['error'] = 'Lỗi chưa xác định , thử lại sau!!!';
    header('location:index.php');
    exit;
}
$id_admin = mysqli_fetch_array($result)['id_admin'];
$sql = "update admin set password = '$password' where id = '$id_admin'";
mysqli_query($connect,$sql);

$set_token ='none'.'user'.uniqid().'time' ;
$sql = "update forgot_password set token = '$set_token' where token ='$token'";

$_SESSION['success']='Đổi mật khẩu thành công';
header('location:index.php');
mysqli_close($connect);