<?php
session_start();
$id = $_POST['id'];
if(empty($_POST['name'])|empty($_POST['description'])|empty($_POST['specifications'])|empty($_POST['price'])){
    $_SESSION['error'] = "Bạn nhập thiếu thông tin sản phẩm rồi !!!";
    header("location:update.php?id=$id");
    exit;
}
$name = addslashes($_POST['name']);
$description = addslashes($_POST['description']);
$specifications = addslashes($_POST['specifications']);
$price = addslashes($_POST['price']);
if(empty($_POST['discount'])){
    $discount = 0; 
}
else {
    $discount = addslashes($_POST['discount']);
}
$id_manufactors = addslashes($_POST['id_manufactors']);
$id_categorys = addslashes($_POST['id_categorys']);

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
require_once '../connect.php';
$sql = "update products
set name='$name',
photos='$file_name',
description = '$description',
specifications = '$specifications',
price = '$price',
discount = '$discount',
id_manufactors = '$id_manufactors',
id_categorys = '$id_categorys'
where id = '$id'";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if($error){
    echo mysqli_error($connect);
    die();
}
$_SESSION['success'] = "Sửa sản phẩm thành công !!!";
header('location:index.php');