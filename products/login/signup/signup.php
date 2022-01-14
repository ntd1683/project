<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>signup</title>
</head>
<body>
    <div class="wrapper">
        <div class="content">
            <div class="header">
                <h1>tạo tài khoản mới</h1>
            </div>
            <div>
                <form method="post" action="process_signup.php" class="signup_form">
                    <input type="text" name="first_name" class="name" placeholder="Họ">
                    <input type="text" name="name" class="name" placeholder="Tên">
                    <input type="text" name="phone_number" id="" placeholder="Số điện thoại">
                    <input type="text" name="email" id="" placeholder="Email">
                    giới tính:
                    <input type="radio" class="radio_input" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="0"> Nữ
                    <input type="radio" class="radio_input" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="1"> Nam
                    <input type="radio" class="radio_input" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="2"> Khác  
                    <input type="password" name="password" id="" placeholder="Mật khẩu">
                    <input type="password" name="confirm_password" id="" placeholder="Nhập lại mật khẩu">
                    <button type="submit" class="button login_button">signup</button>
                </form>
            </div>
            
        </div>
    </div>
</body>
</html>