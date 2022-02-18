<?php
$q = $_GET['q'];
require_once '../connect.php';
$sql = "select * from categorys where name like '%$q%'";
$result = mysqli_query($connect,$sql);
$arr =[];
foreach($result as $each){
    $arr[] = $each;
}
echo json_encode($arr);