<?php
session_start();
if(empty($_POST['name'])|empty($_POST['description'])|empty($_POST['price'])|$_FILES['photos']['size']==0){
    $_SESSION['error'] = "Bạn nhập thiếu thông tin nhà sản xuất rồi !!!";
    header('location:insert.php');
    exit;
}
$name = addslashes($_POST['name']);
$description = addslashes($_POST['description']);
$price = addslashes($_POST['price']);
if(empty($_POST['discount'])){
    $discount = 0; 
}
else {
    $discount = addslashes($_POST['discount']);
}
$photos = $_FILES['photos'];
$id_manufactors = addslashes($_POST['id_manufactors']);
$id_categorys = addslashes($_POST['id_categorys']);

$photos = $_FILES['photos'];
$folder = 'img/';
$file_extention = explode('.',$photos['name'])[1];
$file_name = 'img_'.time().'.'.$file_extention;
$path_file = $folder.$file_name;
move_uploaded_file($photos["tmp_name"],$path_file);


require_once '../connect.php';
$sql = "insert into products (name,description,price,discount,photos,id_manufactors,id_categorys)
values ('$name','$description','$price',$discount,'$file_name','$id_manufactors','$id_categorys')";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if($error){
    echo mysqli_error($connect);
    die();
}
$_SESSION['success'] = "Thêm sản phẩm thành công !!!";
header('location:index.php');