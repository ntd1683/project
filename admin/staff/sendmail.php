<?php
session_start();
if(empty($_SESSION['sign_up_email'])|empty($_SESSION['sign_up_name'])|empty($_SESSION['sign_up_gender'])){
    $_SESSION['error'] = 'Điền thiếu thông tin vui lòng điền lại !!!'; 
    header('location:insert.php');
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
$link = current_url()."/change_password.php?token=$token";
$file =  `../asset/img/file/thankyou.png`;
$title = "Chúc mừng bạn trúng tuyển !!!";
$desription="    Xin chào $gender $name,<br><br>

Chúng tôi xin chúc mừng $gender đã trúng tuyển được nhận vào làm bên mình, <br>
Để bắt đầu công việc của mình , $gender vui lòng click bên cạnh để đổi mật khẩu, <br>
Email là email mà $gender đã cung cấp. <br>
<a href='$link'>Click vào đây!!!</a><br>
Cảm ơn $gender $name chúc bạn một ngày tốt lành
<br>";

require '../PHPMailer/mail.php';
send_mail($email,$name,$title,$desription,$file);
unset($_SESSION['sign_up_name']);
unset($_SESSION['sign_up_email']);
unset($_SESSION['sign_up_gender']);
$_SESSION['success'] = "Thêm nhân viên thành công !!!";
header('location:index.php');