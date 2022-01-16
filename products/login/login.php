<?php require_once "../url.php" ?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>login</title>
</head>
<body>
    <div class="wrapper">
        <div class="content">
            <div class="logo">
                <img src="<?php echo ROOT_URL; ?>products/assets/images/mona-loading-dimmed.gif" alt="logo" width="150" height="150" style="background-color: while">
            </div>
            <form method="post" action="button_submit.php" autocomplete="off">
                <div class="login_form">
                    <div class="user_name">
                        <h3>user name</h3>
                        <input type="text" name="user_name" id="input_user_name" class="input">
                    </div>
                    <div class="password">
                        <h3>password</h3>
                        <input type="password" name="password" id="input_password" class="input">
                    </div>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="checkbox" id="checkbox">  Remember me
                </div>
                <div class="wrap_button">
                    <div class="bar">
                        <button name="login" type="submit" class="button login_button">login</button>
                        <button name="register" class="button signup_button">signup</button>
                    </div>
                </div>
            </form>
            <?php 
                if(isset($_SESSION["error"]) == true) {
                    if($_SESSION["error"] == true) {
                        echo '<p id="response" style="color:red;font-size:20px;visibility:visible">tài khoản hoặc mật khẩu sai</p>';
                        unset($_SESSION["error"]);
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
