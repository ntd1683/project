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
                    <a href="../customer/">
                        <div class="info" id="info-user">
                            <i class="fas fa-users icon-info"></i>
                            <div class="content-info">
                                <h2><?php echo $users ?></h2>
                                <p>USERS</p>
                            </div>
                        </div>
                    </a>
                    <a href="../product/">
                        <div class="info" id="info-products">
                            <i class="ti-package icon-info"></i>
                            <div class="content-info">
                                <h2><?php echo $products ?></h2>
                                <p>Products</p>
                            </div>
                        </div>
                    </a>
                    <a href="../manufactor/">
                        <div class="info" id="info-manufacters">
                            <i class="far fa-clipboard icon-info"></i>
                            <div class="content-info">
                                <h2><?php echo $orders ?></h2>
                                <p>Orders</p>
                            </div>
                        </div>
                    </a>
                    <a href="../order/">
                        <div class="info" id="info-user">
                            <i class="ti-money icon-info"></i>
                            <div class="content-info">
                                <h2 style="font-size: 28px;margin-top:30px;">~<?php echo $money ?></h2>
                                <p>VNĐ</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div id="table-achive">
                    <div id="vip-customer" class="table">
                        <!-- sql customers -->
                        <?php
                        $sql_customers = "SELECT customers.*,ifnull(sum(total_price),0) as total_paid,COUNT(orders.id_customers) as quantity_orders FROM customers LEFT JOIN orders on customers.id = orders.id_customers WHERE orders.status = 1 group by customers.id ORDER by total_paid DESC limit 5";
                        $result = mysqli_query($connect,$sql_customers);
                        ?>
                        <h2>Khách Hàng Vip</h2>
                        <table>
                            <tr>
                                <th style="width: 30%;">Tên</th>
                                <th>Ngày Sinh </th>
                                <th>Số Điện Thoại</th>
                                <th>Số đơn đã đặt</th>
                                <th>Đã Mua</th>
                            </tr>
                            <?php foreach($result as $each) :?>
                            <tr>
                                <td><?php echo $each['name'] ?></td>
                                <td><?php echo $each['date'] ?></td>
                                <td><?php echo $each['phone'] ?></td>
                                <td><?php echo $each['quantity_orders'] ?></td>
                                <td><?php echo number_format($each['total_paid'], 0, ',', '.')?> VNĐ</td>
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                    <div id="selling-product" class="table">
                    <!-- sql sản phẩm bán chạy -->
                    <?php
                    $sql_products = "select products.name,products.id,manufactors.name as name_manufactors,ifnull(sum(quantity),0) as quantity_sales from products join manufactors on products.id_manufactors = manufactors.id left join orders_products on orders_products.id_products = products.id left join orders on orders.id = orders_products.id_orders where orders.status = 1 group by products.id ORDER by quantity_sales DESC limit 5";
                    $result = mysqli_query($connect,$sql_products);
                    ?>
                        <h2>Sản Phẩm Bán Chạy</h2>
                        <table>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th style="width: 30%;">Tên nhà sản xuất</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng đã bán</th>
                            </tr>
                            <?php foreach ($result as $each):?>
                            <tr>
                                <td><?php echo $each['id'] ?></td>
                                <td><?php echo $each['name_manufactors'] ?></td>
                                <td><?php echo $each['name'] ?></td>
                                <td><?php echo $each['quantity_sales'] ?></td>
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                    <br>
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
<?php mysqli_close($connect) ?>
</body>
</html>