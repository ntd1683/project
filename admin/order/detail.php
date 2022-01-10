<?php session_start();
require '../check_admin.php';
require '../connect.php';
if(!isset($_GET['id'])){
    $_SESSION['error'] = 'Chức năng này đang bị lỗi vui lòng thử lại sau';
    header('location:index.php');
    exit;
}
$id = $_GET['id'];
$sql = "select orders_products.*,products.name,products.photos,products.price,products.discount
from orders_products 
join products on id_products=products.id WHERE id_orders = '$id' ";
$result = mysqli_query($connect,$sql);
$total_discount = 0;
$total_money =0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết hoá đơn</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/detail_order.css">   
    <link rel="stylesheet" href="../asset/css/menu_sidebar.css">
    <!-- js -->
    <script defer src="../asset/js/menu_sidebar.js"></script>
</head>
<body>
     <!-- nav -->
    <div id="nav">
    <i class="ti-menu" onclick="open_menu_sidebar()" id="open_menu"></i>
        <a href="index.php">
            <img src="../asset/img/logo/logo.png" alt="logo" class="logo">
        </a>
        <h2 class="header"><i class="ti-pencil-alt"></i>Chi tiết hoá đơn</h2>
    </div>
    <link rel="stylesheet" href="../asset/css/menu_sidebar.css">
    <?php require '../asset/php/menu_sidebar.php' ?>
    <div id="main">
        <div id="container">
            <div id="header">
                <i class="ti-pencil-alt header-margin"></i>
                Chi tiết hoá đơn
            </div>
            <div id="body-container">
            <div id="content-table">
                <table>
                    <tr>
                        <th class="content-table-img">Sản phẩm</th>
                        <th class="content-table-name"></th>
                        <th class="content-table-price">Đơn giá</th>
                        <th class="content-table-quantity">Số lượng</th>
                        <th class="content-table-total">Tổng</th>
                    </tr>
                    <?php foreach($result as $each) : ?>
                    <tr>
                        <td>
                            <img src="../product/img/<?php echo $each['photos'] ?>" alt="ảnh sản phẩm" style="width:100%;">
                        </td>
                        <td><?php echo $each['name'] ?></td>
                        <td class="price"><?php echo $each['price'] ?></td>
                        <td style="text-align:center;"><?php echo $each['quantity'] ?></td>
                        <td><?php $total_price = $each['price']*$each['quantity'];
                        echo $total_price;
                        ?></td>
                        <?php $total_discount += ($each['price']*$each['discount']*0.01*$each['quantity']);
                        $total_money += $total_price;
                        ?>          
                    </tr>
                    <?php endforeach ?>
                    <tr style="text-align:center;color: #707070;background-color:#FAFAFA;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            Tổng Tiền <br>
                            Giảm giá <br>
                        </td>
                        <td class="total">
                            <p><?php echo $total_money?> <span>đ</span></p>
                            <p><?php echo $total_discount ?> <span>đ</span> </p>
                        </td>
                    </tr>
                    <tr style="text-align:center;color: #707070;font-size:18px;border:0px;background-color:#FAFAFA;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            Tổng Thanh Toán
                        </td>
                        <td class="total-cost">
                            <p><?php echo $total_money-$total_discount?> <span>đ</span></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php mysqli_close($connect) ?>
</body>
</html>