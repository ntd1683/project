<?php
session_start();
if(empty($_POST['name'])|empty($_POST['description'])|empty($_POST['price'])){
    $_SESSION['error'] = "Bạn nhập thiếu thông tin nhà sản xuất rồi !!!";
    header('location:update.php');
    exit;
}
$id = $_POST['id'];
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
if(empty($_POST['name_categorys'])){
    $name_categorys = "Khác";
}
else{
    $name_categorys = explode(',',$_POST['name_categorys']);
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
require_once '../connect.php';
$sql = "update products
set name='$name',
photos='$file_name',
description = '$description',
specifications = '$specifications',
price = '$price',
discount = '$discount',
id_manufactors = '$id_manufactors'
where id = '$id'";
mysqli_query($connect,$sql);
echo mysqli_error($connect);
die();
foreach($name_categorys as $name_category){
    $sql ="select * from categorys where name = '$name_category'";
    $result=mysqli_query($connect,$sql);
    $category = mysqli_fetch_array($result);
    if(empty($category)){
        $sql_add_categorys = "insert into categorys (name) values ('$name_category')";
        mysqli_query($connect,$sql_add_categorys); 
        $id_category = mysqli_insert_id($connect);
    } else{
        $id_category = $category['id'];
        $sql ="DELETE FROM classify_products WHERE id_product ='$id' and id_category ='$id_category'";
        mysqli_query($connect,$sql);
    }
    $sql_category = "insert into classify_products (id_category,id_product)
    values('$id_category','$id')";
    mysqli_query($connect,$sql_category);
}
$_SESSION['success'] = "Sửa sản phẩm thành công !!!";
header('location:index.php');