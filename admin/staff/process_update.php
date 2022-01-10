<?php
session_start();
require_once '../connect.php';
if(empty($_POST['id'])){
    $_SESSION['error'] = "Chức năng đang bị lỗi vui lòng thử lại sau !!!";
    header('location:index.php');
    exit;
}
$id = $_POST['id'];
if(empty($_POST['name'])|!isset($_POST['gender'])|empty($_POST['adress'])|!isset($_POST['level'])|empty($_POST['email'])|empty($_POST['phone'])|empty($_POST['date'])){
    $_SESSION['error'] = "Bạn nhập thiếu thông tin nhân viên rồi !!!";
    header("location:update.php?id=$id");
    exit;
}
$email = addslashes($_POST['email']);
$name = addslashes($_POST['name']);
$gender = addslashes($_POST['gender']);
$adress = addslashes($_POST['adress']);
$date = $_POST['date'];
$phone = addslashes($_POST['phone']);

$level = addslashes($_POST['level']);
$sql = "select * from admin where id='$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
if($level < $each['level'] ){
    $_SESSION['error'] = 'Bạn không có quyền hạ cấp người này';
    header('location:index.php');
    exit;
}
$photos_new = $_FILES['photos_new'];
if ($photos_new['size']<=0){
    $file_name = $_POST['photos_old'];
}
else{
    $folder = 'img/';
    $file_extention = explode('.',$photos_new['name'])[1];
    $file_name = 'img_'.time().'.'.$file_extention;
    $path_file = $folder.$file_name;
    move_uploaded_file($photos_new["tmp_name"],$path_file);
    unlink("img/$photos_old");
}

$sql = "update admin set
name = '$name',
gender = '$gender',
adress = '$adress',
date = '$date',
level = '$level',
email = '$email',
phone = '$phone',
photos = '$file_name' where id ='$id'";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if($error){
    echo mysqli_error($connect);
    die();
}
$_SESSION['success']="Sửa thông tin thành công";
header('location:index.php');
mysqli_close($connect);