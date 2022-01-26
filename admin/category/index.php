<?php session_start();
require_once '../check_super_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Thể Loại</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/menu.css">
    <link rel="stylesheet" href="../asset/css/style_category.css">
    <link rel="stylesheet" href="../asset/css/notifi.css">
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
<?php 
$search ='';
$page ='1';
if(isset($_GET['search'])){
    $search=$_GET['search'];
}
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
require_once '../connect.php';

$sql_categorys = "select count(*) from categorys  where name like '%$search%'";
$arr_categorys = mysqli_query($connect,$sql_categorys);
$result_categorys = mysqli_fetch_array($arr_categorys);
$total_categorys = $result_categorys['count(*)'];

$category_in_page = 10;
$total_page = ceil($total_categorys/$category_in_page);
$skip_page = $category_in_page*($page-1);

$sql = "select * from categorys where name like '%$search%' limit $category_in_page offset $skip_page";
$result = mysqli_query($connect,$sql);
?>
    <div id="main">
        <div id="contain">
            <?php include '../asset/php/nav.php'?>
            <?php include '../asset/php/menu_sidebar.php'?>
            <div id="body-contain">
                <?php include '../asset/php/notifi.php'?>
                <h2 class="hello">Chào <?php echo $_SESSION['name'] ?> , Chào mừng bạn trở lại !!!</h2>
                <div id="content">
                    <h3 class="header">Quản Lý Thể Loại</h3>
                    <p class="color-text">Quản lý các thể loại hàng</p>
                    <div class="content-search">
                        <i class="ti-search"></i>
                        <form>
                            <input type="search" name="search" class="search" placeholder="Tìm Kiếm Thể Loại" id="input-search" value="<?php echo $search ?>">
                        </form>
                        <div class="add">
                                <a href="insert.php" id="a-add">
                                    <i class="ti-plus"></i>
                                    <p>Thêm Thể Loại</p>
                                </a>
                            </div>
                    </div>
                    <div id="content-table">
                        <table>
                            <tr>
                                <th class="content-table-id">Mã</th>
                                <th class="content-table-name">Tên</th>
                                <th class="content-table-img">Sản phẩm</th>
                                <th class="content-table-fix">Sửa</th>
                                <th class="content-table-delete">Xoá</th>
                            </tr>
                        <?php foreach($result as $each):?>
                            <tr>
                                <td><?php echo $each['id']?></td>
                                <td><?php echo $each['name']?></td>
                                <td>
                                    <?php
                                    $id_categorys = $each['id'];
                                    $sql_check = "SELECT count(*) FROM `classify_products` where id_category = '$id_categorys'";
                                    $result = mysqli_query($connect,$sql_check);
                                    $products = mysqli_fetch_array($result)['count(*)'];
                                    echo $products;
                                    ?>
                                </td>
                                <td>
                                    <a href="update.php?id=<?php echo $each['id']?>" class="table-a-fix"><i class="ti-check-box"></i>Sửa</a>
                                </td>
                                <td>
                                    <a href="delete.php?id=<?php echo $each['id']?>" class="table-a-delete"><i class="far fa-trash-alt"></i>Xoá</a>
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
                <div>${item.label}<br>
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
            input_search.style.width='460%';
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