<?php session_start();
require '../check_admin.php';
require '../connect.php';
if(empty($_GET['id'])&empty($_SESSION['id'])){
    $_SESSION['error'] = 'Chức năng bị lỗi vui lòng thử lại sau';
    header('loaction:index.php');
    exit;
}
if(isset($_GET['id'])){
    $id = $_SESSION['id'];
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$sql = "select * from admin where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
$error = mysqli_num_rows($result);
if($error == 0){
    $_SESSION['error'] = 'Không tồn tại nhân viên này';
    header('location:index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Nhân Viên</title>
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
    <script defer src="../asset/js/staff_update.js"></script>
</head>
<body>
     <!-- nav -->
    <div id="nav">
    <i class="ti-menu" onclick="open_menu_sidebar()" id="open_menu"></i>
        <a href="index.php">
            <img src="../asset/img/logo/logo.png" alt="logo" class="logo">
        </a>
        <h2 class="header"><i class="ti-pencil-alt"></i>Sửa Nhân Viên</h2>
    </div>
    <?php require '../asset/php/menu_sidebar.php' ?>
    <div id="main">
        <div id="container">
            <div id="header">
                <i class="ti-pencil-alt header-margin"></i>
                Sửa Nhân Viên
            </div>
            <div id="body-container">
                <form method="post" action="process_update.php" onsubmit="return false" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
                    <label for="input_name" class="body-text-header">Tên</label>
                    <input class="input-text" type="text" name="name" id="input_name" value="<?php echo $each['name'] ?>">
                    <span id="span-error-name">
                        <i id="icon-name" class="ti-info-alt icon-size"></i>
                        <div id="error-name" class="error-hidden">Lưu ý khi nhập :
                            <br> tên không được để trống 
                        </div>
                    </span>
                    <br>
                    <label class="body-text-header">Giới tính</label>
                    <input type="radio" name="gender" value="1" style="margin-right:10px"
                    <?php if($each['gender']==1){ echo 'checked';}?>
                    >Nam
                    <input type="radio" name="gender" value="0" style="margin-right:10px" <?php if($each['gender']==0){ echo 'checked';}?>>Nữ
                    <label for="input_phone" class="body-text-header" style="margin-top:10px">Số điện thoại</label>
                    <input class="input-text" type="tel" name="phone" id="input_phone" value="<?php echo $each['phone'] ?>">
                    <span id="span-error-phone">
                        <i id="icon-phone" class="ti-info-alt icon-size"></i>
                        <div id="error-phone" class="error-hidden">Lưu ý khi nhập :
                            <br> Số điện thoại ghi liền và không được để trống 
                        </div>
                    </span>
                    <br>
                    <label for="input_email" class="body-text-header" style="margin-top:10px">Email</label>
                    <input class="input-text" type="email" name="email" id="input_email" value="<?php echo $each['email'] ?>">
                    <span id="span-error-email">
                        <i id="icon-email" class="ti-info-alt icon-size"></i>
                        <div id="error-email" class="error-hidden">Lưu ý khi nhập :
                            <br> Không được bỏ trống
                        </div>
                    </span>
                    <br>
                    <label for="input_adress" class="body-text-header">Địa chỉ</label>
                    <input class="input-text" type="text" name="adress" id="input_adress" value="<?php echo $each['adress'] ?>">
                    <span id="span-error-adress">
                        <i id="icon-adress" class="ti-info-alt icon-size"></i>
                        <div id="error-adress" class="error-hidden">Lưu ý khi nhập :
                            <br> Địa chỉ không được để trống 
                        </div>
                    </span>
                    <br>
                    <label for="input_date" class="body-text-header">Ngày sinh</label>
                    <input class="input-text" type="date" name="date" id="input_date" value="<?php echo $each['date'] ?>">
                    <br>
                    <label for="input_picture" class="body-text-header">Ảnh</label>
                    <input class="input-text" type="file" name="photos_new" id="input_picture">
                    <span id="span-error-picture">
                        <i id="icon-picture" class="ti-info-alt icon-size"></i>
                        <div id="error-picture" class="error-hidden">Lưu ý khi nhập :
                            <br> Nhớ chọn file hợp lệ </div>
                    </span>
                    <br>
                    <label for="input_picture" class="body-text-header">Ảnh Cũ</label>
                    <input class="input-text" type="hidden" name="photos_old" id="input_picture" value="<?php echo $each['photos'] ?>">
                    <img src="img/<?php echo $each['photos'] ?>" alt="Ảnh Cũ" style="height: 150px;border: radius 15px;">
                    <br>
                    <div class="clear"></div>
                    <label for="id_level" class="body-text-header text-select">Cấp độ</label>
                    <select name="level" id="id_level" class="input-text">
                        <option value="0" <?php if($each['level']==0){ echo 'selected';}?>>Nhân Viên</option>
                        <option value="1" <?php if($each['level']==1){ echo 'selected';}?>>Quản Lý</option>
                    </select>
                    <div class="clear"></div>
                    <button class="button-submit submit" onclick="return push_button_submit()">Sửa nhân viên</button>
                    <?php if($_SESSION['level']==1 & $each['level']==0){?>
                    <button class="button-submit delete" onclick="return push_delete()">Xoá nhân viên</button>
                    <?php } ?>
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
    <script>
        function push_delete(){
            let text = "Bạn có chắc chắn muốn xoá khách hàng này không ???";
            if (confirm(text) == true) {
                window.open("delete.php?id=<?php echo $each['id'] ?>","_self");
            }
        }
    </script>
    <?php mysqli_close($connect) ?>
</body>
</html>