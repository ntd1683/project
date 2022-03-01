<?php 
function get_order_product($order_status) { // 1 da duoc duyet, 0 chua duoc duyet
    $order = array();
    require ROOT_PATH . "products/db/connect.php";
    if(!isset($_SESSION)) { 
        session_start();
    }
    $userid = $_SESSION["userID"];
    $query = "SELECT * FROM `orders` WHERE id_customers='$userid' AND status='$order_status'";
    $orders_result = mysqli_query($mysqli, $query);

    foreach($orders_result as $orders_data) {
        $id_order = $orders_data["id"];
        $query = "SELECT * FROM orders_products WHERE id_orders = '$id_order'";
        $orders_products_result = mysqli_query($mysqli, $query);
        {
            foreach($orders_products_result as $orders_products_data) {
                $id_products = $orders_products_data["id_products"];
                if(count($order) == 0) {
                    $order[$id_products] = $orders_products_data["quantity"];
                } 
                else {
                    foreach($order as $product_ID => $quantity) {
                        if($id_products == $product_ID) {
                            $order[$id_products] += $orders_products_data["quantity"];
                        }
                        else {
                            $order[$id_products] = $orders_products_data["quantity"];
                        }
                    }
                }
            }
        }
    }
    return $order;
}




function get_order() {
    $product = array (
        "id" => 0,
        "name" => "",
        "photo" => "",
        "quantity" => 0,
        "price" => 0,
    );

    // $array_products = array($product);
    $array_products = array();

    $order = array(
        "id_order" => 0,
        "time_order" => "",
        "phone_receiver" => 0,
        "adress_receiver" => "",
        "status" => 0,
        "total_price" => 0,
        "products" => $array_products,
    );

    // $arr_orders = array($order);
    $arr_orders = array();

    require ROOT_PATH . "products/db/connect.php";
    if(!isset($_SESSION)) { 
        session_start();
    }

    $userid = $_SESSION["userID"];

    $query = "SELECT * FROM `orders` WHERE id_customers='$userid'";
    $orders_result = mysqli_query($mysqli, $query);
    foreach($orders_result as $ord) {
        $ord_id = $ord["id"];
        $query = "SELECT * FROM `orders_products` WHERE id_orders='$ord_id'";
        $orders_products_result = mysqli_query($mysqli, $query);
        foreach($orders_products_result as $orders_products) {
            if(isset($orders_products["id_products"])) {
                $product_id = $orders_products["id_products"];
                $query = "SELECT * FROM `products` WHERE id='$product_id'";
                $product_result = mysqli_query($mysqli, $query);
                $product_quantity = $orders_products["quantity"];
                foreach($product_result as $prod) {
                    $product["id"] = $prod["id"];
                    $product["name"] = $prod["name"];
                    $product["photo"] = $prod["photos"];
                    $product["quantity"] = $product_quantity;
                    $product["price"] = $prod["price"];
                    array_push($array_products, $product);
                }
            }
        }
        $order["id_order"] = $ord["id"];
        $order["time_order"] = $ord["time_order"];
        $order["phone_receiver"] = $ord["phone_receiver"];
        $order["adress_receiver"] = $ord["adress_receiver"];
        $order["status"] = $ord["status"];
        $order["total_price"] = $ord["total_price"];
        $order["products"] = $array_products;

        array_push($arr_orders, $order);
        unset($array_products);
        $array_products = array();
    }

    // echo json_encode($arr_orders);
    return $arr_orders;
}