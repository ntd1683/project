<?php
require_once '../connect.php';
    $max_date = $_POST['days'];
    $sql_highchart = "SELECT DATE_FORMAT(time_order,'%e-%m') as day,
    sum(total_price) as sales FROM `orders`
    WHERE DATE(time_order) >= CURDATE() - INTERVAL $max_date DAY
    GROUP BY DATE_FORMAT(time_order,'%e-%m')";
    $result = mysqli_query($connect,$sql_highchart);
    $arr = [];
    $today = date('d');
    if($today<$max_date){
        $get_day_last_month = $max_date - $today;
        $last_month_date = date("Y-m-d",strtotime(" -1 month "));
        $last_month = date("m",strtotime(" -1 month "));
        $max_date_last_month = (new DateTime($last_month_date))->format('t');
        $start_date_last_month = $max_date_last_month - $get_day_last_month;
        for($i = $start_date_last_month;$i<=$max_date_last_month;$i++){
            $key = $i . '-' . $last_month;
            $arr[$key] = 0;  
        }
        $start_date = 1;
    }
    else{
        $start_date = $today - $max_date;
    }
    $this_month = date('m');
    for($i = $start_date;$i<=$today;$i++){
        $key = $i . '-' . $this_month;
        $arr[$key] = 0;  
    }
    foreach ($result as $each){
        $arr[$each['day']] = (float)$each['sales'];
    }
    echo json_encode($arr);