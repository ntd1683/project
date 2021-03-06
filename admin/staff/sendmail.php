<?php
session_start();
require_once '../check_super_admin.php';
require_once'../connect.php';
if(empty($_SESSION['sign_up_email'])|empty($_SESSION['sign_up_name'])|!isset($_SESSION['sign_up_gender'])){
    $_SESSION['error'] = 'Điền thiếu thông tin vui lòng điền lại !!!';
    header('location:insert.php');
    exit;
}
function current_url()
{
    $url = "http://" . $_SERVER['HTTP_HOST'] ;
    return $url;
}

$email = $_SESSION['sign_up_email'];
$name = $_SESSION['sign_up_name'];
if($_SESSION['sign_up_gender']==1){
    $gender = 'anh';
}
else{
    $gender = 'chị';
}
$token = uniqid();
$sql = "select * from admin where email = '$email'";
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'];
$sql = "insert into forgot_password (id_customers,token) values('$id','$token')";
mysqli_query($connect,$sql);

$link = current_url()."/change_password.php?token=$token";
$title = "Chúc mừng bạn trúng tuyển !!!";
$desription="    Xin chào $gender $name,<br><br>

Chúng tôi xin chúc mừng $gender đã trúng tuyển được nhận vào làm bên mình, <br>
Để bắt đầu công việc của mình , $gender vui lòng click bên cạnh để đổi mật khẩu, <br>
<a href='$link'>Click vào đây!!!</a><br>
Cảm ơn $gender $name chúc bạn một ngày tốt lành
<br>";

require '../PHPMailer/mail.php';
send_mail($email,$name,$title,$desription);
unset($_SESSION['sign_up_name']);
unset($_SESSION['sign_up_email']);
unset($_SESSION['sign_up_gender']);
$_SESSION['success'] = "Thêm nhân viên thành công !!!";
header('location:index.php');