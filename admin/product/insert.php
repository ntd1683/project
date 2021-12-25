<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/insert_products.css">
    <!-- js -->
    <script defer src="../asset/js/insert_products.js"></script>
</head>
<body>
     <!-- nav -->
    <div id="nav">
        <a href="index.php">
            <img src="../asset/img/logo/logo.png" alt="logo" class="logo">
        </a>
        <h2 class="header"><i class="ti-pencil-alt"></i>Thêm Sản Phẩm</h2>
    </div>
    <div id="main">
        <div id="container">
            <div id="header">
                <i class="ti-pencil-alt header-margin"></i>
                Thêm Sản Phẩm
            </div>
            <div id="body-container">
                <form method="post" action="process_insert.php" onsubmit="return false" enctype="multipart/form-data">
                    <label for="input_name" class="body-text-header">Tên Sản Phẩm</label>
                    <input class="input-text" type="text" name="name" id="input_name">
                    <span id="span-error-name">
                        <i id="icon-name" class="ti-info-alt icon-size"></i>
                        <div id="error-name" class="error-hidden">Lưu ý khi nhập :
                            <br> Tên không được để trống 
                        </div>
                    </span>
                    <br>
                    <label for="input_description" class="body-text-header">Mô Tả Sản Phẩm</label>
                    <textarea name="description" id="input_description" class="input-text"></textarea>
                    <span id="span-error-description">
                        <i id="icon-description" class="ti-info-alt icon-size"></i>
                        <div id="error-description" class="error-hidden">Lưu ý khi nhập :
                            <br> Nhập chi tiết sản phẩm
                        </div>
                    </span>
                    <br>
                    <label for="input_price" class="body-text-header">Giá Gốc</label>
                    <input class="input-text" type="number" name="price" id="input_price">
                    <span id="span-error-price">
                        <i id="icon-price" class="ti-info-alt icon-size"></i>
                        <div id="error-price" class="error-hidden">Lưu ý khi nhập :
                            <br>Đơn vị Đồng</div>
                    </span>
                    <br>
                    <label for="input_discount" class="body-text-header">Giá Giảm</label>
                    <input class="input-text" type="number" name="discount" id="input_discount">
                    <span id="span-error-discount">
                        <i id="icon-discount" class="ti-info-alt icon-size"></i>
                        <div id="error-discount" class="error-hidden">Lưu ý khi nhập :
                            <br> Không bắt buộc , đơn vị Đồng
                            <br></div>
                    </span>
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
                    <label for="id_manufactors" class="body-text-header text-select">Tên Nhà Sản Xuất</label>
                    <select name="id_manufactors" id="id_manufactors" class="input-text">
                        <option value="1">Seed Studio</option>
                        <option value="2">MakerLab.vn</option>
                        <option value="3">Ai-Thinker</option>
                        <option value="4">NVIDIA</option>
                    </select>
                    <div class="clear"></div>
                    <label for="id_category" class="body-text-header text-select">Tên Loại Mặt Hàng</label>
                    <select name="id_category" id="id_category" class="input-text">
                        <option value="1">Mạch máy tính</option>
                        <option value="2">Mạch điện</option>
                        <option value="3">Đồ dùng điện </option>
                    </select>
                    <div class="clear"></div>
                    <button id="button-submit" onclick="return push_button_submit()">Đăng kí</button>
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