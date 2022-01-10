<?php
session_start();
require_once '../connect.php';
if(empty($_POST['name'])|!isset($_POST['gender'])|empty($_POST['adress'])|!isset($_POST['level'])|$_FILES['photos']['size']==0|empty($_POST['email'])|empty($_POST['phone'])|empty($_POST['date'])){
    $_SESSION['error'] = "Bạn nhập thiếu thông tin nhân viên rồi !!!";
    header('location:insert.php');
    exit;
}
$email = addslashes($_POST['email']);
$sql = "select * from admin where email = '$email'";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result)!==0){
    $_SESSION['error'] = 'Email đã tồn tại trong hệ thống, vui lòng thử lại';
    header('location:insert.php');
    exit;
}
$name = addslashes($_POST['name']);
$gender = addslashes($_POST['gender']);
$adress = addslashes($_POST['adress']);
$date = $_POST['date'];
$phone = addslashes($_POST['phone']);
$photos = $_FILES['photos'];
$level = addslashes($_POST['level']);
$password = 'user_'.uniqid();
$_SESSION['sign_up_email'] = $email;
$_SESSION['sign_up_name'] = $name;
$_SESSION['sign_up_gender'] = $gender;
$folder = 'img/';
$file_extention = explode('.',$photos['name'])[1];
$file_name = 'img_'.time().'.'.$file_extention;
$path_file = $folder.$file_name;
move_uploaded_file($photos["tmp_name"],$path_file);

$sql = "insert into admin (name,gender,adress,date,photos,level,email,password,phone)
values ('$name','$gender','$adress','$date','$file_name','$level','$email','$password','$phone')";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if($error){
    echo mysqli_error($connect);
    die();
}
header('location:sendmail.php');
mysqli_close($connect);