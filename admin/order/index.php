<?php session_start();
require '../check_admin.php';
require_once '../connect.php';

$search ='';
$page ='1';
if(isset($_GET['search'])){
    $search=$_GET['search'];
}
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
require_once '../connect.php';
$from_date = '2022-01-01';
if(!empty($_GET['from_date'])){
    $from_date = $_GET['from_date'];
}
$to_date = date('Y-m-d');
if(isset($_GET['to_date'])){
    $to_date = $_GET['to_date'];;
}
$sql_orders = "select count(*) from orders where name_receiver like '%$search%' and time_order > '$from_date'and time_order <= '$to_date' ORDER BY time_order DESC";
$arr_orders = mysqli_query($connect,$sql_orders);
$result_orders = mysqli_fetch_array($arr_orders);
$total_orders = $result_orders['count(*)'];

$order_in_page = 5;
$total_page = ceil($total_orders/$order_in_page);
$skip_page = $order_in_page*($page-1);

$sql = "select * from orders where name_receiver like '%$search%' and time_order > '$from_date'and time_order <= '$to_date' ORDER BY time_order DESC limit $order_in_page offset $skip_page";
$result = mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Đơn Hàng</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/menu.css">
    <link rel="stylesheet" href="../asset/css/notifi.css">
    <link rel="stylesheet" href="../asset/css/style_order.css">
    <!-- js -->
    <script defer src="../asset/js/notifi.js"></script>
    <!-- css livesearch -->
    <style>
    .ui-autocomplete-loading {
        background: white url("img/ui-anim_basic_16x16.gif") right center no-repeat;
    }
  </style>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>
<body>
    <div id="main">
        <div id="contain">
        <?php include '../asset/php/nav.php'?>
            <?php include '../asset/php/menu_sidebar.php'?>
            <div id="body-contain">
                <h2 class="hello">Chào <?php echo $_SESSION['name'] ?>, Chào mừng bạn trở lại !!!</h2>
                <?php include '../asset/php/notifi.php' ?>
                <div id="content">
                    <h3 class="header">Quản Lý Đơn Hàng</h3>
                    <p class="color-text">Quản lý các đơn hàng tiêu dùng</p>
                    <div class="content-search">
                        <label for="input-search"><i class="ti-search"></i></label>
                        <form>
                            <input type="search" name="search" class="search" placeholder="Tìm Kiếm Đơn Hàng Theo Tên Người Nhận " id="input-search" value="<?php echo $search ?>">
                        </form>
                        <i class="ti-filter" id="filter" onclick="push_filter()"></i>
                    </div>
                    <div id="statistical" style="display: none;">
                        <form method="GET">
                            <div class="date">
                                <p class="text-date">FROM</p>
                                <input type="date" name="from_date" class="input_date"
                                <?php if(isset($_GET['from_date'])){?>
                                    value="<?php echo $from_date ?>"
                                <?php } ?>
                                >
                            </div>
                            <div class="date">
                                <p class="text-date">TO</p>
                                <input type="date" name="to_date" class="input_date" value="<?php echo $to_date?>">
                            </div>
                            <button id="button-submit">Lọc Kết Quả</button>
                        </form>
                    </div>
                    <div class="clear"></div>
                    <div id="content-table">
                        <table>
                            <tr>
                                <th style="width:5%;">Chi tiết</th>
                                <th class="content-table-id">Mã</th>
                                <th class="content-table-name">Tên người nhận</th>
                                <th class="content-table-time">Thời gian</th>
                                <th class="content-table-phone">Số điện thoại người nhận</th>
                                <th class="content-table-adress">Địa chỉ</th>
                                <th class="content-table-total-price">Tổng giá tiền</th>
                                <th class="content-table-status">Tình trạng đơn</th>
                                <th class="content-table-fix">Sửa</th>
                            </tr>
                                <?php foreach($result as $each):?>
                                <tr>
                                    <td><a class="table-a-fix" href="detail.php?id=<?php echo $each['id']?>"><i class="ti-new-window"></i></a></td>
                                    <td><?php echo $each['id']?></td>           
                                    <td><?php echo $each['name_receiver'] ?></td>
                                    <td><?php echo $each['time_order']?></td>
                                    <td><?php echo $each['phone_receiver']?></td>
                                    <td><?php echo $each['adress_receiver']?></td>
                                    <td><?php echo $each['total_price']?> VNĐ</td>
                                    <td>
                                        <?php
                                        if($each['status']==0){
                                            echo 'Đang chờ duyệt';
                                        }
                                        else if($each['status']==1){
                                            echo 'Đã Duyệt';
                                        }
                                        else{
                                            echo 'Đã Huỷ';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="update.php?id=<?php echo $each['id'] ?>"class="table-a-fix"><i class="ti-check-box"></i>Sửa</a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                        </table>
                    </div>
                    <div id="footer">
                        <?php for($i=1;$i<=$total_page;$i++){?>
                        <a href="index.php?page=<?php echo $i ?>&search=<?php echo $search ?>"><div class="page color-text"><?php echo $i ?></div></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js live search -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function () { 
            $( "#input-search" ).autocomplete({
                minLength: 0,
                source: 'search.php',
                focus: function( event, ui ) {
                    $( "#project" ).val( ui.item.label );
                    return false;
                },
                select: function( event, ui ) {
                    window.location.href = `update.php?id=${ui.item.value}`;
                    return false;
                }
                })
            .autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .append(`
                <div>${item.time} / ${item.label} / ${item.total_price}
                `)
                .appendTo( ul );
            };
        });
  </script>
    <script>
        function open_menu_sidebar(){
            document.getElementById('menu-sidebar').style.visibility = "visible";
            document.getElementById('nav').style.left = "16%";
            let body_contain = document.getElementById('body-contain');
            body_contain.style.marginLeft='20%';
            body_contain.style.width='80%';
            let input_search = document.getElementById('input-search');
            input_search.style.width='535%';
            let a_add = document.getElementById('a-add');
            a_add.style.fontSize='13px';
        }
       function close_menu_sidebar(){
            document.getElementById('menu-sidebar').style.visibility = "hidden";
            document.getElementById('nav').style.left = "0";
            let body_contain = document.getElementById('body-contain');
            body_contain.style.marginLeft='0';
            body_contain.style.width='';
            let input_search = document.getElementById('input-search');
            input_search.style.width=''; 
            let a_add = document.getElementById('a-add');
            a_add.style.fontSize=''; 
        }
        function push_filter(){
            let filter = document.getElementById('statistical');
            if(filter.style.display == "none"){
                filter.style.display = "block";
            }
            else{
                filter.style.display = "none";
            }
        }
    </script>
    <?php mysqli_close($connect) ?>
</body>
</html>