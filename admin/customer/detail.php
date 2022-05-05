<?php session_start();
require_once '../check_super_admin.php';
require_once '../connect.php';
if(empty($_GET['id'])){
    $_SESSION['error']="Chức năng này đang lỗi vui lòng thử lại sau";
    header('location:index.php');
    exit;
}
$id = $_GET['id'];
$sql = "SELECT customers.*,ifnull(sum(total_price),0) as total_paid,COUNT(orders.id_customers) as quantity_orders FROM customers LEFT JOIN orders on customers.id = orders.id_customers where customers.id = '$id' group by customers.id";
$result = mysqli_query($connect,$sql);
$each_customer = mysqli_fetch_array($result);
$sql = "SELECT customers.name,products.name as name_product,products.price,products.photos, sum(orders_products.quantity)quantity FROM `orders` RIGHT JOIN customers on customers.id = orders.id_customers INNER JOIN orders_products on orders_products.id_orders = orders.id LEFT JOIN products on products.id = orders_products.id_products where id_customers = '$id' GROUP BY orders_products.id_products";
$result = mysqli_query($connect,$sql);

//= die(mysqli_error($connect));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Khách Hàng</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/detail_customer.css">
    <link rel="stylesheet" href="../asset/css/detail.css">
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
        <h2 class="header"><i class="far fa-user" style="font-size: 20px;"></i></i> Chi Tiết Khách Hàng</h2>
    </div>
    <?php require '../asset/php/menu_sidebar.php' ?>
    <div id="main">
        <div id="container">
            <div id="avatar">
                <img src="photos/<?php echo $each_customer['photos'] ?>" alt="Ảnh khách hàng">
            </div>
            <div id="body-container">
            <h1><?php echo $each_customer['name'] ?></h1>
                    <table width="100%" class="table_product">
                        <tr>
                            <th>Tên sản phẩm đã mua</th>
                            <th>Giá</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Số lượng</th>
                        </tr>
                        <?php foreach ($result as $each) {?>
                        <tr>
                            <td><?php echo $each['name_product'];?></td>
                            <td><?php echo $each['price'];?></td>
                            <td>
                                <img src="../product/img/<?php echo $each['photos'] ?>" alt="Ảnh sản phẩm" style="height:150px">
                            </td>
                            <td><?php echo $each['quantity']?></td>
                        </tr>
                        <?php } ?>
                    </table>
                    <label class="body-text-header">Tổng số tiền đã mua</label>
                    <input class="input-text" type="text" value="<?php echo number_format($each_customer['total_paid'], 0, ',', '.') ?> đ" readonly="" style="font-size: 25px;text-align: center;color:red;">
                    <button id="button-submit" onclick="return push_button_submit()">Xoá</button>
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
            </div>
        </div>
    </div>
    <script>
        function push_button_submit(){
            let text = "Bạn có chắc chắn muốn xoá khách hàng này không ???";
            if (confirm(text) == true) {
                window.open("delete.php?id=<?php echo $each_customer['id'] ?>","_self");
            }
        }
    </script>
    <?php mysqli_close($connect) ?>
</body>
</html>