<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Nhà Sản Xuất</title>
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/insert_manufactors.css">
    <!-- js -->
    <script defer src="../asset/js/insert_manufactors.js"></script>
</head>
<body>
     <!-- nav -->
    <div id="nav">
        <a href="index.php">
            <img src="../asset/img/logo/logo.png" alt="logo" class="logo">
        </a>
        <h2 class="header"><i class="ti-pencil-alt"></i> Sửa Nhà Sản Xuất </h2>
    </div>
    <div id="main">
        <div id="container">
            <div id="header">
                <i class="ti-pencil-alt header-margin"></i>
                Sửa nhà sản xuất
            </div>
            <div id="body-container">
                <form method="post" action="process_update.php" onsubmit="return false" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="">
                    <label for="input_name" class="body-text-header">Tên</label>
                    <input class="input-text" type="text" name="name" id="input_name" value="">
                    <span id="span-error-name">
                        <i id="icon-name" class="ti-info-alt icon-size"></i>
                        <div id="error-name" class="error-hidden">Lưu ý khi nhập :
                            <br> Tên không được để trống 
                            <br> và đúng ngữ pháp tiếng việt</div>
                    </span>
                    <br>
                    <label for="input_description" class="body-text-header">Mô tả ngắn</label>
                    <input class="input-text" type="text" name="description" id="input_description" value="">
                    <span id="span-error-description">
                        <i id="icon-description" class="ti-info-alt icon-size"></i>
                        <div id="error-description" class="error-hidden">Lưu ý khi nhập :
                            <br> Mô tả ngắn về nhà sản xuất <br>Gồm 250 kí tự<br> và không được bỏ trống</div>
                    </span>
                    <br>
                    <label for="input_picture" class="body-text-header">Logo nhà sản xuất</label>
                    <input class="input-text" type="file" name="photo_new" id="input_picture">
                    <br>
                    <label for="input_picture" class="body-text-header">Logo cũ </label>
                    <img src="img/1639921693.jpg" alt="logo cũ" width="150px" style="border:1px solid #000;border-radius:5px;">
                    <input class="input-text" type="hidden" name="photo_old" id="input_picture" value="">
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