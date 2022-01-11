<?php session_start();
require_once '../check_super_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Thông Báo</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/insert_notifi.css">
    <link rel="stylesheet" href="../asset/css/menu_sidebar.css">
    <!-- js -->
    <script defer src="../asset/js/menu_sidebar.js"></script>
    <script defer src="../asset/js/insert_notifi.js"></script>
</head>
<body>
     <!-- nav -->
    <div id="nav">
    <i class="ti-menu" onclick="open_menu_sidebar()" id="open_menu"></i>
        <a href="index.php">
            <img src="../asset/img/logo/logo.png" alt="logo" class="logo">
        </a>
        <h2 class="header"><i class="ti-pencil-alt"></i> Thêm Thông Báo</h2>
    </div>
    <?php require '../asset/php/menu_sidebar.php' ?>
    <div id="main">
        <div id="container">
            <div id="header">
                <i class="ti-pencil-alt header-margin"></i>
                Thêm Thông Báo
            </div>
            <div id="body-container">
                <form method="post" action="process_insert.php" onsubmit="return false" enctype="multipart/form-data">
                    <label for="input_detail" class="body-text-header">Thông Báo</label>
                    <input class="input-text" type="text" name="detail" id="input_detail">
                    <span id="span-error-detail">
                        <i id="icon-detail" class="ti-info-alt icon-size"></i>
                        <div id="error-detail" class="error-hidden">Lưu ý khi nhập :
                            <br>Không được bỏ trống</div>
                    </span>
                    <br>
                    <input type="checkbox" name="pin" id="check_pin">
                    <label for="check_pin" class="check">Bạn có muốn ghim thông báo không</label>
                    <br>
                    <button id="button-submit" onclick="return push_button_submit()">Thêm</button>
                    <?php if(isset($_SESSION['error'])) {?>
                        <h3 class="error">
                            <i id="icon-name" class="ti-info-alt icon-size"></i>  Lỗi : <?php echo $_SESSION['error'] ?>
                        </h3>
                        <?php unset($_SESSION['error']);
                        ?>
                    <?php } if(isset($_SESSION['success'])){ ?>
                        <h3 class="error">
                            <i id="icon-name" class="ti-info-alt icon-size"></i> <?php echo $_SESSION['success'] ?>
                        </h3>
                        <?php unset($_SESSION['success']);
                        ?>
                    <?php }?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>