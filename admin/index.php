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
    <link rel="stylesheet" href="./asset/css/signin.css">
    <!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div id="main">
        <div id="contain">
            <form method="post" action="process_login.php" id="form_login">
                    <div id="email">
                        <input style="color: black !important;" type="email" name="email" id="input_email" class="input" placeholder="Nhập email">
                        <i class="ti-info-alt" id="icon-email"></i>
                        <span id="input_email-error" for="input_email">
                            Nhập email bạn đã cung cấp cho quản lý
                        </span>
                    </div>
                    <div id="password">
                        <input style="color: black !important;" type="password" name="password" id="input_password" class="input" placeholder="Nhập mật khẩu">
                        <i class="ti-eye" id="hidden" onclick="hidden_password()"></i>
                        <i class="ti-info-alt" id="icon-password" ></i>
                        <span id="input_password-error" for="input_password">
                            Mật khẩu sử dụng trên 8 kí tự có chữ cái in hoa, chữ thường và kí tự đặc biệt
                        </span>
                    </div>
                <div id="remember">
                    <input type="checkbox" name="remember" id="input_checkbox">
                    <label for="input_checkbox" class="text"> Ghi nhớ đăng nhập</label><br>
                </div>
                <button type="submit" id="button" onclick="signin()">Đăng Nhập</button>
                <a href="forgot_password.php" class="forgot_pw">Quên Mật Khẩu ? </a>
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
            <?php if(isset($_SESSION['success'])){?>
            <div id="error" class="success">
                <i class="ti-info-alt"></i>
                <p> 
                <?php echo $_SESSION['success'];
                ?>
                </p>
            </div>
            <?php unset($_SESSION['success']);} ?>
        </div>
    </div>
    <?php mysqli_close($connect) ?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
    <script>
        document.getElementById('input_email').onkeydown = function (b){
    if (b.keyCode==13){
        signin();
    }
};
document.getElementById('input_password').onkeydown = function (c){
    if (c.keyCode==13){
        signin();
    }
};

let check_hidden = 1;
function hidden_password(){
    console.log(2);
    let password = document.getElementById('input_password');
    if(check_hidden % 2 != 0){
        password.setAttribute("type","text");
    }
    else{
        password.setAttribute("type","password");
    }
    check_hidden++;
}
function signin(){
        document.getElementById('input_email-error').remove();
        document.getElementById('input_password-error').remove();
}
        $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/i.test(value);
        }, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");
        $("#form_login").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "email": {              
                    required: true,
                    email:true
                },
                "password": {
                    required: true,
                    minlength: 8,
                    validatePassword:true
                }
            },
            messages: {
                "email": {
                    required: "Bắt buộc nhập email",
                    email: "Nhập email không hợp lệ"
                },
                "password": {
                    required: "Bắt buộc nhập mật khẩu",
                    minlength: "Hãy nhập ít nhất 8 ký tự"
                }
		    },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>
</body>
</html>