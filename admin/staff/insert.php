<?php session_start();
require '../check_super_admin.php';
require '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/insert_staff.css">    
    <link rel="stylesheet" href="../asset/css/menu_sidebar.css">
    <!-- js -->
    <script defer src="../asset/js/menu_sidebar.js"></script>
    <script defer src="../asset/js/insert_staff.js"></script>
</head>
<body>
     <!-- nav -->
    <div id="nav">
    <i class="ti-menu" onclick="open_menu_sidebar()" id="open_menu"></i>
        <a href="index.php">
            <img src="../asset/img/logo/logo.png" alt="logo" class="logo">
        </a>
        <h2 class="header"><i class="ti-pencil-alt"></i>Thêm Nhân Viên</h2>
    </div>
    <?php require '../asset/php/menu_sidebar.php'?>
    <div id="main">
        <div id="container">
            <div id="header">
                <i class="ti-pencil-alt header-margin"></i>
                Thêm Nhân Viên
            </div>
            <div id="body-container">
                <form method="post" action="process_insert.php" onsubmit="return false" enctype="multipart/form-data">
                    <label for="input_name" class="body-text-header">Tên</label>
                    <input class="input-text" type="text" name="name" id="input_name" value="">
                    <span id="span-error-name">
                        <i id="icon-name" class="ti-info-alt icon-size"></i>
                        <div id="error-name" class="error-hidden">Lưu ý khi nhập :
                            <br> tên không được để trống 
                        </div>
                    </span>
                    <br>
                    <label class="body-text-header">Giới tính</label>
                    <input type="radio" name="gender" value="1" style="margin-right:10px" checked>Nam
                    <input type="radio" name="gender" value="0" style="margin-right:10px">Nữ
                    <label for="input_phone" class="body-text-header" style="margin-top:10px">Số điện thoại</label>
                    <input class="input-text" type="tel" name="phone" id="input_phone" value="">
                    <span id="span-error-phone">
                        <i id="icon-phone" class="ti-info-alt icon-size"></i>
                        <div id="error-phone" class="error-hidden">Lưu ý khi nhập :
                            <br> Số điện thoại ghi liền và không được để trống 
                        </div>
                    </span>
                    <br>
                    <label for="input_email" class="body-text-header" style="margin-top:10px">Email</label>
                    <input class="input-text" type="email" name="email" id="input_email" value="">
                    <span id="span-error-email">
                        <i id="icon-email" class="ti-info-alt icon-size"></i>
                        <div id="error-email" class="error-hidden">Lưu ý khi nhập :
                            <br> Không được bỏ trống
                        </div>
                    </span>
                    <br>
                    <label for="input_adress" class="body-text-header">Địa chỉ</label>
                    <input class="input-text" type="text" name="adress" id="input_adress" value="">
                    <span id="span-error-adress">
                        <i id="icon-adress" class="ti-info-alt icon-size"></i>
                        <div id="error-adress" class="error-hidden">Lưu ý khi nhập :
                            <br> Địa chỉ không được để trống 
                        </div>
                    </span>
                    <br>
                    <label for="input_date" class="body-text-header">Ngày sinh</label>
                    <input class="input-text" type="date" name="date" id="input_date">
                    <br>
                    <label for="input_picture" class="body-text-header">Ảnh</label>
                    <input class="input-text" type="file" name="photos" id="input_picture">
                    <span id="span-error-picture">
                        <i id="icon-picture" class="ti-info-alt icon-size"></i>
                        <div id="error-picture" class="error-hidden">Lưu ý khi nhập :
                            <br> Nhớ chọn file hợp lệ </div>
                    </span>
                    <br>
                    <div class="clear"></div>
                    <label for="id_level" class="body-text-header text-select">Cấp độ</label>
                    <select name="level" id="id_level" class="input-text">
                        <option value="0" selected>Nhân Viên</option>
                        <option value="1">Quản Lý</option>
                    </select>
                    <div class="clear"></div>
                    <button class="button-submit" onclick="return push_button_submit()">Thêm nhân viên</button>
                    <?php if(isset($_SESSION['error'])) {?>
                        <h3 class="error">
                            <i id="icon-name" class="ti-info-alt icon-size"></i>  Lỗi : <?php echo $_SESSION['error'] ?>
                        </h3>
                        <?php unset($_SESSION['error']);
                            unset($_SESSION['success']);
                        ?>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>