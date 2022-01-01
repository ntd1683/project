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
    <link rel="stylesheet" href="./asset/css/signin.css">
    <!-- js -->
    <script defer src="./asset/js/signin.js"></script>
</head>
<body>
    <div id="main">
        <div id="contain">
            <form method="post" action="process_signin.php"  onsubmit="return false">
                    <div id="email">
                        <input type="email" name="email" id="input_email" class="input" placeholder="Nhập email">
                        <i class="ti-info-alt" id="icon-email"></i>
                        <span id="span-error-email">
                            Nhập email bạn đã cung cấp cho quản lý
                        </span>
                    </div>
                    <div id="password">
                        <input type="password" name="password" id="input_password" class="input" placeholder="Nhập mật khẩu">
                        <i class="ti-eye" id="hidden" onclick="hidden_password()"></i>
                        <i class="ti-info-alt" id="icon-password"></i>
                        <span id="span-error-password">
                            Mật khẩu sử dụng trên 8 kí tự có chữ cái in hoa, chữ thường và kí tự đặc biệt
                        </span>
                    </div>
                <div id="remember">
                    <input type="checkbox" name="remember" id="input_checkbox">
                    <label for="input_checkbox" class="text"> Ghi nhớ đăng nhập</label><br>
                </div>
                <button type="submit" onclick="return signin()" id="button">Đăng Nhập</button>
            </form>
            <?php if(isset($_SESSION['error'])){?>
            <div id="error">
                <i class="ti-info-alt"></i>
                <p> 
                Lỗi : <?php echo $_SESSION['error'];
                ?>
                </p>
            </div>
            <?php 
                    unset($_SESSION['error']); } ?>
        </div>
    </div>
</body>
</html>