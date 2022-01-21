<?php
    require_once '../connect.php';
    $arr=[];
    $max_day = $_POST['days'];
    $sql_highchart2 = "SELECT orders.status,COUNT(orders.status) as count_status FROM `orders_products` join orders on orders.id = orders_products.id_orders WHERE DATE(time_order) >= CURDATE() - INTERVAL $max_day DAY GROUP by orders.status";
    $result = mysqli_query($connect,$sql_highchart2);
    foreach ($result as $each){
        $key = (int)$each['status'];
        if($key==-1){
            $key ==2; 
        }
        $arr[$key] = (int)$each['count_status'];
    }
    echo json_encode($arr);
