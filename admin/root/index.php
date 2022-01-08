<?php session_start();
require_once '../check_admin.php';
require '../connect.php';
$sql = "select count(*) from customers";
$result = mysqli_query($connect,$sql);
$users = mysqli_fetch_array($result)['count(*)'];
$sql = "select count(*) from products";
$result = mysqli_query($connect,$sql);
$products = mysqli_fetch_array($result)['count(*)'];
$sql = "select count(*) from orders";
$result = mysqli_query($connect,$sql);
$orders = mysqli_fetch_array($result)['count(*)'];
$sql = "select sum(total_price) as total_money from orders where status = 1";
$result = mysqli_query($connect,$sql);
$total_money = mysqli_fetch_array($result)['total_money'];
if($total_money > 1000000){
    $money = round($total_money/1000000).'M';
}
else if($total_money >1000){
    $money = round($total_money/1000).'K';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/style_admin.css">
    <link rel="stylesheet" href="../asset/css/menu.css">
    <link rel="stylesheet" href="../asset/css/notifi.css">
    <!-- js -->
    <script defer src="../asset/js/notifi.js"></script>
</head>
<body>
    <div id="main">
        
        <div id="contain">
        <?php include '../asset/php/nav.php'?>
        <?php include '../asset/php/menu_sidebar.php'?>
            <!-- body - contain -->
            <div id="body-contain">
                <?php include '../asset/php/notifi.php' ?>
                <h2 class="hello">Chào <?php echo $_SESSION['name'] ?> , chào mừng bạn trở lại !!!</h2>
                <div id="infomation">
                    <div class="info" id="info-user">
                        <i class="fas fa-users icon-info"></i>
                        <div class="content-info">
                            <h2><?php echo $users ?></h2>
                            <p>USERS</p>
                        </div>
                    </div>
                    <div class="info" id="info-products">
                        <i class="ti-package icon-info"></i>
                        <div class="content-info">
                            <h2><?php echo $products ?></h2>
                            <p>Products</p>
                        </div>
                    </div>
                    <div class="info" id="info-manufacters">
                        <i class="far fa-clipboard icon-info"></i>
                        <div class="content-info">
                            <h2><?php echo $orders ?></h2>
                            <p>Orders</p>
                        </div>
                    </div>
                    <div class="info" id="info-user">
                        <i class="ti-money icon-info"></i>
                        <div class="content-info">
                            <h2 style="font-size: 28px;margin-top:30px;">~<?php echo $money ?></h2>
                            <p>VNĐ</p>
                        </div>
                    </div>
                </div>
                <div id="table-achive">
                    <div id="vip-customer" class="table">
                        <h2>Khách Hàng Vip</h2>
                        <table>
                            <tr>
                                <th style="width: 30%;">Tên</th>
                                <th>Ngày Sinh </th>
                                <th>Số Điện Thoại</th>
                                <th>Đã Mua</th>
                            </tr>
                            <tr>
                                <td>Nguyễn Tấn Dũng</td>
                                <td>16/08/2003</td>
                                <td>0329817809</td>
                                <td>2.000.000$</td>
                            </tr>
                            <tr>
                                <td>Quang Pham</td>
                                <td>2002</td>
                                <td>none</td>
                                <td>none</td>
                            </tr>
                        </table>
                    </div>
                    <div id="selling-product" class="table">
                        <h2>Sản Phẩm Bán Chạy</h2>
                        <table>
                            <tr>
                                <th style="width: 30%;">Mã Sản Xuất</th>
                                <th>Tên</th>
                                <th>Ngày bán</th>
                                <th>Giá</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Xiaomi</td>
                                <td>08/12/2021</td>
                                <td>12.000$</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Apple</td>
                                <td>08/12/2021</td>
                                <td>30.000$</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
       function open_menu_sidebar(){
            document.getElementById('menu-sidebar').style.visibility = "visible";
            document.getElementById('nav').style.left = "16%";
            document.getElementById('body-contain').style.marginLeft='20%';
            let info = document.getElementsByClassName("info");
            for(let i=0;i<info.length;i++){
                info[i].style.marginLeft="15px";
            }       
        }
       function close_menu_sidebar(){
            document.getElementById('menu-sidebar').style.visibility = "hidden";
            document.getElementById('nav').style.left = "0";
            document.getElementById('body-contain').style.marginLeft='0';
            let info = document.getElementsByClassName("info");
            for(let i=0;i<info.length;i++){
                info[i].style.marginLeft="50px";
            }  
        }
    </script>
</body>
</html>