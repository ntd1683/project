<?php
session_start();
require_once '../connect.php';
if(empty($_POST['name'])|empty($_POST['description'])|empty($_POST['price'])|$_FILES['photos']['size']==0){
    $_SESSION['error'] = "Bạn nhập thiếu thông tin nhà sản xuất rồi !!!";
    header('location:insert.php');
    exit;
}
$name = addslashes($_POST['name']);
$sql = "select * from products where name = '$name'";
$result = mysqli_query($connect,$sql);
$check_name = mysqli_num_rows($result);
if($check_name > 0){
    $_SESSION['error']="Sản phẩm đã có trên hệ thống , vui lòng kiểm tra lại !!!";
    header('location:index.php');
    exit;
}
$description = addslashes($_POST['description']);
$specifications = addslashes($_POST['specifications']);
$price = addslashes($_POST['price']);
if(empty($_POST['discount'])){
    $discount = 0; 
}
else {
    $discount = addslashes($_POST['discount']);
}
$photos = $_FILES['photos'];
$id_manufactors = addslashes($_POST['id_manufactors']);
if(empty($_POST['name_categorys'])){
    $name_categorys = "Khác";
}
else{
    $name_categorys = explode(',',$_POST['name_categorys']);
}

$photos = $_FILES['photos'];
$folder = 'img/';
$file_extention = explode('.',$photos['name'])[1];
$file_name = 'img_'.time().'.'.$file_extention;
$path_file = $folder.$file_name;
move_uploaded_file($photos["tmp_name"],$path_file);

$sql = "insert into products (name,description,price,discount,photos,id_manufactors,specifications)
values ('$name','$description','$price',$discount,'$file_name','$id_manufactors','$specifications')";
mysqli_query($connect,$sql);
$id_product = mysqli_insert_id($connect);
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
    }
    $sql_category = "insert into classify_products (id_category,id_product)
    values('$id_category','$id_product')";
    mysqli_query($connect,$sql_category);
}
$_SESSION['success'] = "Thêm sản phẩm thành công !!!";
header('location:index.php');