<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa hoá đơn</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/update_order.css">
    <!-- js -->
    <script defer src="../asset/js/order_update.js"></script>
</head>
<body>
     <!-- nav -->
    <div id="nav">
        <a href="index.php">
            <img src="../asset/img/logo/logo.png" alt="logo" class="logo">
        </a>
        <h2 class="header"><i class="ti-pencil-alt"></i>Sửa Hoá Đơn</h2>
    </div>
    <div id="main">
        <div id="container">
            <div id="header">
                <i class="ti-pencil-alt header-margin"></i>
                Sửa Hoá Đơn
            </div>
            <div id="body-container">
                <form method="post" action="process_update.php" onsubmit="return false">
                <input type="hidden" name="id" value="">
                    <label for="input_name" class="body-text-header">Tên người nhận</label>
                    <input class="input-text" type="text" name="name_receiver" id="input_name" value="">
                    <span id="span-error-name">
                        <i id="icon-name" class="ti-info-alt icon-size"></i>
                        <div id="error-name" class="error-hidden">Lưu ý khi nhập :
                            <br> tên không được để trống
                        </div>
                    </span>
                    <br>
                    <!-- khi đơn mua không đăng nhập sẽ k có ô này ạ -->
                    <label class="body-text-header">Tên khách hàng</label>
                    <input class="input-text" type="text" value="" readonly >
                    <br>
                    <label for="input_phone" class="body-text-header">Số điện thoại người nhận</label>
                    <input type="tel" name="phone_receiver" id="input_phone" class="input-text" value="" >
                    <span id="span-error-phone">
                        <i id="icon-phone" class="ti-info-alt icon-size"></i>
                        <div id="error-phone" class="error-hidden">Lưu ý khi nhập :
                            <br> Chỉ được nhập số điện thoại
                        </div>
                    </span>
                    <br>
                    <label for="input_adress" class="body-text-header">Địa chỉ người nhận</label>
                    <input class="input-text" type="text" name="adress_receiver" id="input_adress" value="">
                    <span id="span-error-adress">
                        <i id="icon-adress" class="ti-info-alt icon-size"></i>
                        <div id="error-adress" class="error-hidden">Lưu ý khi nhập :
                            <br>Nhập địa chỉ nhận</div>
                    </span>
                    <br>
                    <label for="input_email" class="body-text-header">Email</label>
                    <input class="input-text" type="email" name="email_receiver" id="input_email" value="">
                    <span id="span-error-email">
                        <i id="icon-email" class="ti-info-alt icon-size"></i>
                        <div id="error-email" class="error-hidden">Lưu ý khi nhập :
                            <br>Email người nhận</div>
                    </span>
                    <br>
                    <label for="input_status" class="body-text-header">Tình trạng đơn</label>
                    <select name="status" id="input_status" class="input-text">
                        <option value="0" selected>Đang chờ duyệt</option>
                        <option value="1" >Đã duyệt</option>
                        <option value="-1">Đã huỷ</option>
                    </select>
                    <br>
                    <label class="body-text-header">Thời gian đặt</label>
                    <input class="input-text" type="text" value="" readonly >
                    <br>
                    <label for="input_note" class="body-text-header">Note</label>
                    <textarea name="note" id="input_note" style="height: 65px;" class="input-text"></textarea>
                    <span id="span-error-note">
                        <i id="icon-note" class="ti-info-alt icon-size"></i>
                        <div id="error-note" class="error-hidden">Lưu ý khi nhập :
                            <br>Không nên chỉnh sửa của khách</div>
                    </span>
                    <br>
                    <label class="body-text-header">Tổng tiền</label>
                    <input class="input-text" type="text" value="" readonly style="text-align: center;">
                    <br>
                    <div class="clear"></div>
                    <?php if($_SESSION['level']==1) {?>
                    <button id="button-delete" onclick="push_button_delete()">Xoá Đơn</button>
                    <?php } ?>
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
    <script>
    function push_button_delete(){
        let text = "Bạn có chắc chắn muốn xoá không ??? Nếu xoá bạn sẽ không thể khôi phục";
        if (confirm(text) == true) {
            window.open("delete.php?id=<?php echo $_GET['id']?>");
        }
    }
    </script>
</body>
</html>