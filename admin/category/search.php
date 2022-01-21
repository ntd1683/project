<?php

$search = $_GET['term'];
require_once '../connect.php';
$sql_search = "select * from categorys where name like '%$search%'";
$result_search = mysqli_query($connect,$sql_search);

$arr =[];
foreach($result_search as $each_search){
    $arr[]=[
        'value' => $each_search['id'],
        'label' => $each_search['name']
    ];
}
echo json_encode($arr);