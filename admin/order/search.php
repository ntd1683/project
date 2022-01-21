<?php

$search = $_GET['term'];
require_once '../connect.php';
$sql_search = "SELECT *,DATE_FORMAT(time_order,'%d-%m-%Y') as time FROM orders where name_receiver like '%$search%'";
$result_search = mysqli_query($connect,$sql_search);

$arr =[];
foreach($result_search as $each_search){
    $arr[]=[
        'value' => $each_search['id'],
        'label' => $each_search['name_receiver'],
        'time' => $each_search['time'],
        'total_price' => $each_search['total_price']
    ];
}
echo json_encode($arr);