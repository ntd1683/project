<?php session_start();
require_once '../check_super_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhà Sản Xuất</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/insert_manufactors.css">
    <link rel="stylesheet" href="../asset/css/menu_sidebar.css">
    <!-- js -->
    <script defer src="../asset/js/menu_sidebar.js"></script>
    <script defer src="../asset/js/insert_manufactors.js"></script>
</head>
<body>
     <!-- nav -->
    <div id="nav">
    <i class="ti-menu" onclick="open_menu_sidebar()" id="open_menu"></i>
        <a href="index.php">
            <img src="../asset/img/logo/logo.png" alt="logo" class="logo">
        </a>
        <h2 class="header"><i class="ti-pencil-alt"></i> Thêm Nhà Sản Xuất</h2>
    </div>
    <?php require '../asset/php/menu_sidebar.php' ?>
    <div id="main">
        <div id="container">
            <div id="header">
                <i class="ti-pencil-alt header-margin"></i>
                Thêm nhà sản xuất
            </div>
            <div id="body-container">
                <form method="post" action="process_insert.php" onsubmit="return false" enctype="multipart/form-data">
                    <label for="input_name" class="body-text-header">Tên</label>
                    <input class="input-text" type="text" name="name" id="input_name">
                    <span id="span-error-name">
                        <i id="icon-name" class="ti-info-alt icon-size"></i>
                        <div id="error-name" class="error-hidden">Lưu ý khi nhập :
                            <br> Tên không được để trống 
                            <br> và đúng ngữ pháp tiếng việt</div>
                    </span>
                    <br>
                    <label for="input_picture" class="body-text-header">Logo nhà sản xuất</label>
                    <input class="input-text" type="file" name="photos" id="input_picture">
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
    <?php mysqli_close($connect) ?>
</body>
</html>