<?php session_start();
require_once '../check_admin.php';
require '../connect.php';
$sql = "select * from manufactors";
$result_manufactors = mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/insert_products.css">
    <link rel="stylesheet" href="../asset/css/menu_sidebar.css">
    <!-- js -->
    <script defer src="../asset/js/menu_sidebar.js"></script>
    <script defer src="../asset/js/insert_products.js"></script>
    <!-- tag -->
    <link rel="stylesheet" href="./category/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
</head>
<body>
     <!-- nav -->
    <div id="nav">
        <i class="ti-menu" onclick="open_menu_sidebar()" id="open_menu"></i>
        <a href="index.php">
            <img src="../asset/img/logo/logo.png" alt="logo" class="logo">
        </a>
        <h2 class="header"><i class="ti-pencil-alt"></i>Thêm Sản Phẩm</h2>
    </div>
    <?php require '../asset/php/menu_sidebar.php' ?>
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
                    <textarea name="description" id="input_description" class="input-text" rows="15"></textarea>
                    <span id="span-error-description">
                        <i id="icon-description" class="ti-info-alt icon-size"></i>
                        <div id="error-description" class="error-hidden">Lưu ý khi nhập :
                            <br> Nhập chi tiết sản phẩm
                        </div>
                    </span>
                    <br>
                    <label for="input_specifications" class="body-text-header">Thông Số Kỹ Thuật</label>
                    <textarea name="specifications" id="input_specifications" class="input-text" rows="15"></textarea>
                    <span id="span-error-specifications">
                        <i id="icon-specifications" class="ti-info-alt icon-size"></i>
                        <div id="error-specifications" class="error-hidden">Lưu ý khi nhập :
                            <br> Nhập chi tiết thông số kỹ thuật
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
                        <?php foreach($result_manufactors as $each_manufactor):?>
                        <option value="<?php echo $each_manufactor['id'] ?>"><?php echo $each_manufactor['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="clear"></div>
                    <label for="id_category" class="body-text-header text-select">Tên Loại Mặt Hàng</label>
                    <input type="text" name="name_categorys" id="id_category" class="input-text">
                    <div class="clear"></div>
                    <br>
                    <br>
                    <button id="button-submit" onclick="return push_button_submit()">Thêm sản phẩm</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./category/dist/bootstrap-tagsinput.js"></script>    
    <script src="./category/dist/typeahead.bundle.js"></script>
    <script>
        $(document).ready(function () {
            $("form").keypress(function(event){
                if(event.keyCode === 13 ){
                    event.preventDefault();
                }
            });
            var types = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: 'list_type.php?q=%QUERY',
                    wildcard: '%QUERY'
                }
            });

            $('#id_category').tagsinput({
            typeaheadjs: {
                name: 'types',
                displayKey: 'name',
                valueKey: 'name',
                source: types
            },
            freeInput: true
            });
        });
    </script>
</body>
</html>