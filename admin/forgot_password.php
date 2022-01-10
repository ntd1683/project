<?php session_start();
require_once './connect.php';
if(isset($_COOKIE['remember'])){
$token = $_COOKIE['remember'];
$sql = "select * from admin where token = '$token' limit 1";
die($sql);
$result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)==1){
        $each = mysqli_fetch_array($result);
        $id = $each['id'];
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $each['name'];
        $_SESSION['photos'] = $each['photos'];
        $_SESSION['level'] = $each['level'];
    }
}
if(isset($_SESSION['id'])|isset($_SESSION['name'])|isset($_SESSION['photos'])||isset($_SESSION['level'])){
    $_SESSION['success']="Bạn đang đăng nhập";
    header('location:root/index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="./asset/font/themify-icons/themify-icons.css">
    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="./asset/css/forgot_password.css">
    <!-- js -->
    <script defer src="./asset/js/forgot_password.js"></script>
</head>
<body>
    <div id="main">
        <div id="contain">
            <form method="post" action="process_forgot_password.php"  onsubmit="return false">
                    <div id="email">
                        <input type="email" name="email" id="input_email" class="input" placeholder="Nhập email">
                        <i class="ti-info-alt" id="icon-email"></i>
                        <span id="span-error-email">
                            Nhập email bạn đã cung cấp cho quản lý
                        </span>
                    </div>
                <button type="submit" onclick="return signin()" id="button">Quên Mật Khẩu</button>
            </form>
            <?php if(isset($_SESSION['error'])){?>
            <div id="error">
                <i class="ti-info-alt"></i>
                <p> 
                Lỗi : <?php echo $_SESSION['error'];
                ?>
                </p>
            </div>
            <?php unset($_SESSION['error']);} ?>
        </div>
    </div>
    <?php mysqli_close($connect) ?>
</body>
</html>