<?php
session_start();
require '../connect.php';
require '../check_admin.php';
if(!isset($_POST['name_receiver'])|!isset($_POST['phone_receiver'])|!isset($_POST['adress_receiver'])|!isset($_POST['status'])|!isset($_POST['note'])|!isset($_POST['id'])){
    $_SESSION['error']='Vui lòng điển đầy đủ thông tin!!!';
    header('location:update.php');
    exit;
}
$id = $_POST['id'];
$name_receiver = $_POST['name_receiver'];
$phone_receiver = $_POST['phone_receiver'];
$adress_receiver = $_POST['adress_receiver'];
$status = $_POST['status'];
$note = $_POST['note'];
$sql ="update orders set 
name_receiver ='$name_receiver',
adress_receiver ='$adress_receiver',
phone_receiver ='$phone_receiver',
status ='$status',
note ='$note' where id ='$id'";
mysqli_query($connect,$sql);
$_SESSION['success']="Cập nhập đơn hàng thành công!!!";
header('location:index.php');
mysqli_close($connect);
