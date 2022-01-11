<?php
session_start();
include '../check_admin.php';
include_once '../connect.php';

$search ='';
$page ='1';
if(isset($_GET['search'])){
    $search=$_GET['search'];
}
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
require_once '../connect.php';

$sql_notifi = "select count(*) from notifi where detail like '%$search%'";
$arr_notifi = mysqli_query($connect,$sql_notifi);
$result_notifi = mysqli_fetch_array($arr_notifi);
$total_notifi = $result_notifi['count(*)'];
$notifi_in_page = 10;
$total_page = ceil($total_notifi/$notifi_in_page);
$skip_page = $notifi_in_page*($page-1);

$sql = "select * from notifi where detail like '%$search%' order by pin DESC limit $notifi_in_page offset $skip_page ";
$result = mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Thông báo</title>
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
    <link rel="stylesheet" href="../asset/css/style_notifi.css">
    <!-- js -->
    <script defer src="../asset/js/notifi.js"></script>
</head>
<body>
    <div id="main">
        <div id="contain">
        <?php include '../asset/php/nav.php'?>
            <?php include '../asset/php/menu_sidebar.php'?>
            <div id="body-contain">
            <?php include '../asset/php/notifi.php' ?>
                <h2 class="hello">Chào <?php echo $_SESSION['name'] ?> , Chào mừng bạn trở lại !!!</h2>
                <div id="content">
                    <h3 class="header">Quản Lý Thông Báo</h3>
                    <p class="color-text">Quản lý các thông báo mà mọi người đăng</p>
                    <div class="content-search">
                        <i class="ti-search"></i>
                        <form>
                            <input type="search" name="search" class="search" placeholder="Tìm Kiếm Thông Báo" id="input-search" value="<?php echo $search ?>">
                        </form>
                        <div class="add">
                                <a href="insert.php" id="a-add">
                                    <i class="ti-plus"></i>
                                    <p>Thêm Thông Báo</p>
                                </a>
                            </div>
                    </div>
                    <div id="content-table">
                        <table>
                            <tr>
                                <th class="content-table-pin"></th>
                                <th class="content-table-img"></th>
                                <th class="content-table-detail">Nội Dung</th>
                                <?php if($_SESSION['level']==1){ ?>
                                <th class="content-table-fix">Sửa</th>
                                <th class="content-table-delete">Xoá</th>
                                <?php } ?>
                            </tr>
                            <?php foreach($result as $each): ?>
                            <tr>
                                <td>
                                    <?php if($each['pin']==1) {?>
                                        <t class="ti-pin-alt"></t>
                                    <?php }?>
                                </td>
                                <td class="td-img">
                                    <img src="../staff/img/<?php echo $each['photos']?>" alt="avatar <?php echo $each['name']?>" style="float: left;">
                                    <p style="line-height: 50px;">
                                        <?php echo $each['name']?>    : 
                                    </p>
                                </td>
                                <td><?php echo $each['detail'] ?></td>
                                <?php if($_SESSION['level']==1){ ?>
                                <td>
                                    <a href="update.php?id=<?php echo $each['id']?>" class="table-a-fix">
                                        <i class="ti-pencil-alt"></i>Sửa
                                    </a>
                                </td>
                                <td>
                                    <a href="delete.php?id=<?php echo $each['id']?>" class="table-a-delete">
                                        <i class="ti-trash"></i>Xoá
                                    </a>
                                </td>
                                <?php } ?>
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
    <script>
        function open_menu_sidebar(){
            document.getElementById('menu-sidebar').style.visibility = "visible";
            document.getElementById('nav').style.left = "16%";
            let body_contain = document.getElementById('body-contain');
            body_contain.style.marginLeft='20%';
            body_contain.style.width='80%';
            let input_search = document.getElementById('input-search');
            input_search.style.width='540%';
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
    </script>
    <?php mysqli_close($connect) ?>
</body>
</html>