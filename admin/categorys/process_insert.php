<?php
session_start();
if(empty($_POST['name'])){
    $_SESSION['error'] = "Bạn nhập thiếu tên nhà sản xuất rồi !!!";
    header('location:insert.php');
    exit;
}
$name = addslashes($_POST['name']);
if ($_FILES['photos']['size']==0){
$file_name = "default.png";
}
else{
    $photos = $_FILES['photos'];
    $folder = 'img/';
    $file_extention = explode('.',$photos['name'])[1];
    $file_name = 'img_'.time().'.'.$file_extention;
    $path_file = $folder.$file_name;
    move_uploaded_file($photos["tmp_name"],$path_file);
}

require_once '../connect.php';
$sql = "select * from manufactors where name = '$name'";
$result = mysqli_query($connect,$sql);
$num_rows = mysqli_num_rows($result);
if($num_rows==1){
    $_SESSION['error'] = "Lỗi thêm nhà sản xuất vì nhà sản xuất đã tồn tại";
    header('location:insert.php');
    exit;
}

$sql = "insert into manufactors (name,photos) value('$name','$file_name')";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if($error){
    echo mysqli_error($connect);
    die();
}
$_SESSION['success'] = "Thêm nhà sản xuất thành công !!!";
header('location:index.php');