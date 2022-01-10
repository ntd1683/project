<?php
require_once 'connect.php';
session_start();
function current_url()
{
    $url = "http://" . $_SERVER['HTTP_HOST'] ;
    return $url;
}
if(empty($_POST['email'])){
    $_SESSION['error']="Vui lòng điền email !!!";
    header('location:forgot_password.php');
    exit;
}

$email = $_POST['email'];
$check = false;
$sql = "select * from admin where email = '$email'";
$result = mysqli_query($connect,$sql);
$number_rows = mysqli_num_rows($result);
if ($number_rows==1){
    $each = mysqli_fetch_array($result);
    $id_admin = $each['id'];
    $name = $each['name'];
    $gender = $each['gender'];
    $sql = "select * from forgot_password where id_admin = '$id_admin'";
    $result = mysqli_query($connect,$sql);
    $num_rows=mysqli_num_rows($result);
    if($num_rows == 0 ){
        $quantity = mysqli_fetch_array($result)['quantity'];
        $quantity ++;
        $token = uniqid();
        $sql = "insert into forgot_password (id_admin,token,quantity) values('$id_admin','$token','$quantity')";
        mysqli_query($connect,$sql);
        if($gender==1){
            $gender = 'anh';
        }
        else{
            $gender = 'chị';
        }
        $link = current_url()."/project/admin/change_password.php?token=$token";
        $title = "Lấy lại mật khẩu";
        $description="    Xin chào $gender $name,<br><br>
        
        Anh $gender click vào link bên dưới để đổi mật khẩu, <br>
        tuyệt đối không chia sẻ link này cho bất kì ai <br>
        <a href='$link'>Click vào đây!!!</a><br>
        Cảm ơn $gender $name chúc bạn một ngày tốt lành
        <br>";
        require './PHPMailer/mail.php';
        send_mail($email,$name,$title,$description);
        $_SESSION['success'] = 'Kiểm tra cả thư mục spam nha bạn ^^';
        header('location:index.php');
        exit;
    }else if($num_rows==1){
        $quantity = mysqli_fetch_array($result)['quantity'];
        if($quantity < 4 ){
            $quantity++;
            $token = uniqid();
            $sql = "update forgot_password set token ='$token',quantity='$quantity' where id_admin ='$id_admin'";
            mysqli_query($connect,$sql);
            if($gender==1){
                $gender = 'anh';
            }
            else{
                $gender = 'chị';
            }
            $link = current_url()."/project/admin/change_password.php?token=$token";
            $title = "Lấy lại mật khẩu";
            $description="    Xin chào $gender $name,<br><br>
            
            Anh $gender click vào link bên dưới để đổi mật khẩu, <br>
            tuyệt đối không chia sẻ link này cho bất kì ai <br>
            <a href='$link'>Click vào đây!!!</a><br>
            Cảm ơn $gender $name chúc bạn một ngày tốt lành
            <br>";
            require './PHPMailer/mail.php';
            send_mail($email,$name,$title,$description);
            $_SESSION['success'] = 'Kiểm tra cả thư mục spam nha bạn ^^';
            header('location:index.php');
            mysqli_close($connect);
            exit;
        }else{
            $_SESSION['error'] = 'Bạn đã vượt mức quên mật khẩu trong một ngày !!!';
            header('location:index.php');
            mysqli_close($connect);
            exit;
        }
    }
}
else {
    $_SESSION['error'] = 'Email không tồn tại trong hệ thống';
    header('location:index.php');
    mysqli_close($connect);
    exit;
}