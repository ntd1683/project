<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo ROOT_URL . "products/common/Common.css"; ?>>
    <title>Document</title>
</head>
<body>
    <?php 
        session_start();
        if(!isset($_SESSION["logged_in"])) {
            require_once ROOT_PATH . "products/common/set_login_session.php";
        }
    ?>
    <!-- menu bar -->
    <div id="menu_bar" >
        <div class="box_container">
            <div class="column_2">
                <div class="left_column child_column_2">
                    <div class="column_2 web_name">
                        <div class="left_column child_column_2">
                            <a href="<?php echo ROOT_URL . "products/product_page/product_list/index.php"; ?>"><img src="<?php echo ROOT_URL; ?>products/assets/images/mona-loading-dimmed.gif" alt="icon"width="50" height="50"></a>
                        </div>
                        <div class="right_column child_column_2">
                            <a href="<?php echo ROOT_URL . "products/product_page/product_list/index.php"; ?>" style="font-size:30px;margin-left:10px;font-weight:bold">trang chủ</a>
                        </div>
                    </div>
                </div>
                <div class="right_column child_column_2">
                    <div class="right_menu_bar">
                        <div class="column_3">
                            <a href="<?php echo ROOT_URL . "products/product_page/product_list/index.php"; ?>" class="first">
                                <div class="left_column child_column_3">
                                    <b>sản phẩm</b> 
                                </div>
                            </a>
                            <a href="<?php echo ROOT_URL . "products/card/index.php"; ?>">
                                <div class="center_column child_column_3">
                                    <b>giỏ hàng(<?php 
                                            if(isset($_COOKIE['card']) && $_COOKIE['card'] != null) {
                                                echo sizeof(json_decode($_COOKIE["card"], true));
                                            }
                                            else {
                                                echo "0";
                                            }
                                        ?>)
                                    </b>
                                </div>
                            </a>
                            <?php if($_SESSION["logged_in"] == true): ?>
                                <a href=<?php echo ROOT_URL . "products/login/process_logout.php"; ?>>
                                    <div class="right_column child_column_3">
                                        <b>đăng xuất</b>
                                    </div>
                                </a>
                            <?php else: ?>
                                <a href=<?php echo ROOT_URL . "products/login/index.php"; ?>>
                                    <div class="right_column child_column_3">
                                        <b>đăng kí / đăng nhập</b>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>