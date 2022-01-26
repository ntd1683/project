<?php session_start();
require '../check_admin.php';
require '../connect.php';
if(empty($_GET['id'])){
    $_SESSION['error'] = 'Lỗi hệ thống vui lòng thử lại sau' ;
    header('location:index.php');
    exit;
}
$id = $_GET['id'];
$sql = "select * from products where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);

$sql = "SELECT categorys.name as name_categorys FROM `products` 
LEFT JOIN classify_products on products.id = classify_products.id_product 
LEFT JOIN categorys on classify_products.id_category = categorys.id where products.id = '$id'";
$result_categorys = mysqli_query($connect,$sql);
$check_count_categorys = mysqli_num_rows($result_categorys);
$arr =[];
foreach($result_categorys as $each_categorys){
    $arr[] = $each_categorys['name_categorys'];
}
$result_categorys = implode(',',$arr);
$sql = "select * from manufactors";
$result_manufactors = mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
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
    <script defer src="../asset/js/product_update.js"></script>
    <!-- category input -->
    <link rel="stylesheet" href="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
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
                <form method="post" action="process_update.php" onsubmit="return false" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                    <label for="input_name" class="body-text-header">Tên sản phẩm</label>
                    <input class="input-text" type="text" name="name" id="input_name" value="<?php echo $each['name'] ?>">
                    <span id="span-error-name">
                        <i id="icon-name" class="ti-info-alt icon-size"></i>
                        <div id="error-name" class="error-hidden">Lưu ý khi nhập :
                            <br> tên không được để trống 
                        </div>
                    </span>
                    <br>
                    <label for="input_description" class="body-text-header">Mô tả sản phẩm</label>
                    <textarea name="description" id="input_description" class="input-text" rows="15"><?php echo $each['description'] ?></textarea>
                    <span id="span-error-description">
                        <i id="icon-description" class="ti-info-alt icon-size"></i>
                        <div id="error-description" class="error-hidden">Lưu ý khi nhập :
                            <br> nhập chi tiết sản phẩm
                        </div>
                    </span>
                    <br>
                    <label for="input_specifications" class="body-text-header">Thông số kỹ thuật</label>
                    <textarea name="specifications" id="input_specifications" class="input-text" rows="15"><?php echo $each['specifications'] ?></textarea>
                    <span id="span-error-specifications">
                        <i id="icon-specifications" class="ti-info-alt icon-size"></i>
                        <div id="error-specifications" class="error-hidden">Lưu ý khi nhập :
                            <br> nhập chi tiết thông số kỹ thuật sản phẩm
                        </div>
                    </span>
                    <br>
                    <label for="input_price" class="body-text-header">Giá gốc</label>
                    <input class="input-text" type="number" name="price" id="input_price" value="<?php echo $each['price'] ?>">
                    <span id="span-error-price">
                        <i id="icon-price" class="ti-info-alt icon-size"></i>
                        <div id="error-price" class="error-hidden">Lưu ý khi nhập :
                            <br>Đơn vị Đồng</div>
                    </span>
                    <br>
                    <label for="input_discount" class="body-text-header">Giá Giảm</label>
                    <input class="input-text" type="number" name="discount" id="input_discount" value="<?php echo $each['discount'] ?>">
                    <span id="span-error-discount">
                        <i id="icon-discount" class="ti-info-alt icon-size"></i>
                        <div id="error-discount" class="error-hidden">Lưu ý khi nhập :
                            <br> Không bắt buộc , đơn vị Đồng
                            <br></div>
                    </span>
                    <br>
                    <label for="input_picture" class="body-text-header">Ảnh  mới</label>
                    <input class="input-text" type="file" name="photos_new" id="input_picture">
                    <span id="span-error-picture">
                        <i id="icon-picture" class="ti-info-alt icon-size"></i>
                        <div id="error-picture" class="error-hidden">Lưu ý khi nhập :
                            <br> Nhớ chọn file hợp lệ </div>
                    </span>
                    <br>
                    <label for="input_picture" class="body-text-header">Ảnh cũ</label>
                    <input class="input-text" type="hidden" name="photos_old" id="input_picture" value="<?php echo $each['photos'] ?>">
                    <img src="img/<?php echo $each['photos'] ?>" alt="ảnh cũ" width="150px" style="border:1px solid #000;border-radius:5px;" >
                    <br>
                    <div class="clear"></div>
                    <label for="id_manufactors" class="body-text-header text-select">Tên Nhà Sản Xuất</label>
                    <select name="id_manufactors" id="id_manufactors" class="input-text">
                        <?php foreach($result_manufactors as $each_manufactor):?>
                        <option value="<?php echo $each_manufactor['id'] ?>" 
                        <?php if($each_manufactor['id']==$each['id_manufactors']){
                            echo 'selected';    
                        }
                        ?>
                        ><?php echo $each_manufactor['name']?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="clear"></div>
                    <label for="name_category" class="body-text-header">Tên loai mặt hàng</label>
                    <input class="input-text" type="text" name="name_categorys" id="name_category" style="margin-bottom: 0;" value="<?php echo $result_categorys ?>">
                    <br>
                    <button id="button-submit" onclick="return push_button_submit()">Cập nhập sản phẩm</button>
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
    <script type="text/javascript" src="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>   
    <script type="text/javascript" src="bootstrap-tagsinput-latest/typeahead.bundle.js"></script>
    <script>
        $(document).ready(function () {
            $("form").keypress(function(event){
                if(event.keyCode==13){
                    event.preventDefault();
                }
            });
            var categorys = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                    url: 'list_category.php?q=%QUERY',
                    wildcard: '%QUERY'
                }
            });
            categorys.initialize();
            $('#name_category').tagsinput({
            typeaheadjs: {
                name: 'citynames',
                displayKey: 'name',
                valueKey: 'name',
                source: categorys.ttAdapter()
            },
            freeInput: true
            });
        });
    </script>
</body>
</html>