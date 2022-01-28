<?php
require_once "../url.php";
require_once ROOT_PATH . "products/db/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST["adress"])) {
        $adress = $_POST["adress"];
        $sql = "UPDATE customers SET adress = '$adress' WHERE id ='$id'";
        $result = mysqli_query($mysqli, $sql);
    }

    $card = json_decode($_COOKIE["card"], true);
    session_start();
    $id = $_SESSION["userID"];
    $name = $_SESSION["name"];
    $phone = $_SESSION["phone"];
    $adress = $_SESSION["adress"];
    $note = null;
    $total_price = $_SESSION["total_price"];

    if(isset($_POST["note"])) {
        $note = $_POST["note"];
    }

    $insert = "INSERT INTO orders(id_customers, name_receiver, phone_receiver, adress_receiver, note, status, total_price)
                value('$id', '$name', '$phone', '$adress', '$note', 0, '$total_price')";
    $result = mysqli_query($mysqli, $insert);
    if(isset($result)) {
        if($result != null) {
            $query = "SELECT id FROM orders WHERE id_customers = '$id' ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($mysqli, $query);
            if(isset($result)) {
                if($result == null) {
                    echo 0;
                }
            }
            $order = mysqli_fetch_array($result);
            $id_order = $order["id"];

            foreach($card as $productID => $element) {
                $quantity = $element[0];
                $insert = "INSERT INTO orders_products(id_orders, id_products, quantity)
                value($id_order, '$productID', '$quantity')";
                $result = mysqli_query($mysqli, $insert);
                if(isset($result)) {
                    if($result == null) {
                        $status = 0;
                    }
                }
            }

            _setCookie("card", "", time() - 60);

            $status = 1;
        }
        else {
            $status = 0;
        }
    }
    else {
        $status = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="purchase.css">
    <title>purchase</title>
</head>
<body>
    <div class="wrapper">
        <div class="content">
            <div class="status" style="margin-bottom:20px; margin-top:50px">
                <?php if($status == 1): ?>
                    <h3>mua hàng thành công </h3>
                <?php elseif($status == 0): ?>
                    <h3>mua hàng không thành công</h3>
                <?php endif; ?>
            </div>
            <a href="../product_page/product_list/index.php">bấm vào đây để về trang chủ</a>
        </div>
    </div>
</body>
</html>
