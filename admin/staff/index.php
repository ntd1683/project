<?php
session_start();
include '../check_super_admin.php';
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

$sql_admin = "select count(*) from admin where name like '%$search%'";
$arr_admin = mysqli_query($connect,$sql_admin);
$result_admin = mysqli_fetch_array($arr_admin);
$total_admin = $result_admin['count(*)'];
$staff_in_page = 10;
$total_page = ceil($total_admin/$staff_in_page);
$skip_page = $staff_in_page*($page-1);


$sql = "select * from admin where name like '%$search%' limit $staff_in_page offset $skip_page";
$result = mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên</title>
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
    <link rel="stylesheet" href="../asset/css/style_staff.css">
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
                <h2 class="hello">Chào Admin , Chào mừng bạn trở lại !!!</h2>
                <div id="content">
                    <h3 class="header">Quản Lý Nhân Viên</h3>
                    <p class="color-text">Quản lý các nhân viên đăng kí tài khoản</p>
                    <div class="content-search">
                        <i class="ti-search"></i>
                        <form>
                            <input type="search" name="search" class="search" placeholder="Tìm Kiếm Nhân Viên" id="input-search" value="">
                        </form>
                        <div class="add">
                                <a href="insert.php" id="a-add">
                                    <i class="ti-plus"></i>
                                    <p>Thêm Nhân Viên</p>
                                </a>
                            </div>
                    </div>
                    <div id="content-table">
                        <table>
                            <tr>
                                <th class="content-table-id">Mã</th>
                                <th class="content-table-name">Tên</th>
                                <th class="content-table-gender">Giới tính</th>
                                <th class="content-table-date">Ngày sinh </th>
                                <th class="content-table-email">Email</th>
                                <th class="content-table-adress">Địa chỉ</th>
                                <th class="content-table-fix">Sửa và Xoá</th>
                            </tr>
                            <?php foreach($result as $each ) :?>
                            <tr>
                                <td><?php echo $each['id'] ?></td>
                                <td><?php echo $each['name'] ?></td>
                                <td><?php if($each['gender']==1){
                                    echo 'Nam';
                                }
                                else{
                                    echo 'Nữ';
                                }
                                ?></td>
                                <td>
                                <?php echo date('d-m-Y',strtotime($each['date'])) ?>
                                </td>
                                <td>
                                <?php echo $each['email'] ?>
                                </td>
                                <td><?php echo $each['adress'] ?></td>
                                <td><a href="update.php?id=<?php echo $each['id']?>" class="table-a-detail"><i class="ti-new-window"></i></i>Sửa và Xoá</a></td>
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
        }
       function close_menu_sidebar(){
            document.getElementById('menu-sidebar').style.visibility = "hidden";
            document.getElementById('nav').style.left = "0";
            let body_contain = document.getElementById('body-contain');
            body_contain.style.marginLeft='0';
            body_contain.style.width='';
            let input_search = document.getElementById('input-search');
            input_search.style.width='';  
        }
    </script>
    <?php mysqli_close($connect) ?>
</body>
</html>