<?php session_start();
require_once '../check_super_admin.php';
require_once '../connect.php';
$id = $_GET['id'];
$sql = "select * from manufactors where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Nhà Sản Xuất</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
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
        <h2 class="header"><i class="ti-pencil-alt"></i> Sửa Nhà Sản Xuất </h2>
    </div>
    <?php require '../asset/php/menu_sidebar.php' ?>
    <div id="main">
        <div id="container">
            <div id="header">
                <i class="ti-pencil-alt header-margin"></i>
                Sửa nhà sản xuất
            </div>
            <div id="body-container">
                <form method="post" action="process_update.php" onsubmit="return false" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $each['id']?>">
                    <label for="input_name" class="body-text-header">Tên</label>
                    <input class="input-text" type="text" name="name" id="input_name" value="<?php echo $each['name']?>">
                    <span id="span-error-name">
                        <i id="icon-name" class="ti-info-alt icon-size"></i>
                        <div id="error-name" class="error-hidden">Lưu ý khi nhập :
                            <br> Tên không được để trống 
                            <br> và đúng ngữ pháp tiếng việt</div>
                    </span>
                    <br>
                    <label for="input_picture" class="body-text-header">Logo nhà sản xuất</label>
                    <input class="input-text" type="file" name="photos_new" id="input_picture">
                    <br>
                    <label for="input_picture" class="body-text-header">Logo cũ </label>
                    <img src="img/<?php echo $each['photos']?>" alt="logo cũ" width="150px" style="border:1px solid #000;border-radius:5px;">
                    <input class="input-text" type="hidden" name="photos_old" id="input_picture" value="">
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