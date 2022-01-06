<?php
session_start();
require_once '../connect.php';
if(empty($_POST['name'])){
    $_SESSION['error'] = "Bạn nhập thiếu tên nhà sản xuất rồi !!!";
    header('location:update.php');
    exit;
}
$id = $_POST['id'];
$name = addslashes($_POST['name']);
$photos_new = $_FILES['photos_new'];
$photos_old = $_POST['photos_old'];
if ($photos_new['size']<=0){
$file_name = $_POST['photos_old'];
}
else{
    $folder = 'img/';
    $file_extention = explode('.',$photos_new['name'])[1];
    $file_name = 'img_'.time().'.'.$file_extention;
    $path_file = $folder.$file_name;
    move_uploaded_file($photos_new["tmp_name"],$path_file);
    if($photos_old !== "default.png"){
        unlink("img/$photos_old");
    }
}
$sql = "update manufactors set name='$name',photos='$file_name' where id = '$id'";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if($error){
    echo mysqli_error($connect);
    die();
}
$_SESSION['success'] = "Sửa nhà sản xuất thành công !!!";
header('location:index.php');