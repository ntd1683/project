<?php
require_once 'connect.php';

if(empty($_POST['email'])&&empty($_POST['password'])){
    $_SESSION['error']="Vui lòng điền đầy đủ thông tin !!!";
    header('location:index.php');
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['remember'])){
    $remember = true;
}
else{
    $remember = true;
}
$check = false;
$sql = "select * from admin where email = '$email' and password = '$password'";
$result = mysqli_query($connect,$sql);
$number_rows = mysqli_num_rows($result);
if ($number_rows==1){
    $each = mysqli_fetch_array($result);
    session_start();
    $id = $each['id'];
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $each['name'];
    $_SESSION['photos'] = $each['photos'];
    $_SESSION['level'] = $each['level'];
    if($remember){
        do{
            $token = uniqid('user_',true) . time();
            $sql = "update admin set token = '$token' where id = '$id' ";
            mysqli_query($connect,$sql);
            $sql_check_token = "select * from admin where token='$token'";
            $check_token = mysqli_query($connect,$sql_check_token);
            if(empty(mysqli_num_rows($check_token))){
                setcookie('remember',$token,time()+60*60*24);
                $check = true;
            }
        }while($check = false);
    }
    $_SESSION['success']="Đăng nhập thành công";
    header('location:root/index.php');
    exit;
}
$_SESSION['error']= "Đăng nhập thất bại - sai tài khoản hoặc mật khẩu";
header('location:index.php');

mysqli_close($connect);