<?php session_start();
require_once '../check_super_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
        <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/menu.css">
    <link rel="stylesheet" href="../asset/css/style_manufactor.css">
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

$sql_manufactors = "select count(*) from manufactors  where name like '%$search%'";
$arr_manufactors = mysqli_query($connect,$sql_manufactors);
$result_manufactors = mysqli_fetch_array($arr_manufactors);
$total_manufactors = $result_manufactors['count(*)'];

$manufactor_in_page = 5;
$total_page = ceil($total_manufactors/$manufactor_in_page);
$skip_page = $manufactor_in_page*($page-1);

$sql = "select * from manufactors where name like '%$search%' limit $manufactor_in_page offset $skip_page";
$result = mysqli_query($connect,$sql);
?>
    <div id="main">
        <div id="contain">
        <?php include '../asset/php/nav.php'?>
            <?php include '../asset/php/menu_sidebar.php'?>
            <div id="body-contain">
                <?php include '../asset/php/notifi.php' ?>
                <h2 class="hello">Chào <?php echo $_SESSION['name']?> , Chào mừng bạn trở lại !!!</h2>
                <div id="content">
                    <h3 class="header">Quản Lý Nhà Sản Xuất</h3>
                    <p class="color-text">Quản lý các nhà sản xuất cung cấp hàng</p>
                    <div class="content-search">
                        <i class="ti-search"></i>
                        <form>
                            <input type="search" name="search" class="search" placeholder="Tìm Kiếm Nhà Sản Xuất" id="input-search" value="<?php echo $search ?>">
                        </form>
                        <?php if($_SESSION['level']==1){?>
                        <div class="add">
                                <a href="insert.php" id="a-add">
                                    <i class="ti-plus"></i>
                                    <p>Thêm Nhà Sản Xuất</p>
                                </a>
                            </div>
                            <?php }?>
                    </div>
                    <div id="content-table">
                        <table>
                            <tr>
                                <th class="content-table-id">Mã</th>
                                <th class="content-table-name">Tên</th>
                                <th class="content-table-img">Ảnh</th>
                                <?php if($_SESSION['level']==1){?>
                                <th class="content-table-fix">Sửa</th>
                                <th class="content-table-delete">Xoá</th>
                                <?php } ?>
                            </tr>
                        <?php foreach($result as $each):?>
                            <tr>
                                <td><?php echo $each['id']?></td>
                                <td><?php echo $each['name']?></td>
                                <td>
                                    <img src="img/<?php echo $each['photos']?>" alt="Logo Công ty">
                                </td>
                                <?php if($_SESSION['level']==1){?>
                                <td>
                                    <a href="update.php?id=<?php echo $each['id']?>" class="table-a-fix"><i class="ti-check-box"></i>Sửa</a>
                                </td>
                                <td>
                                    <a href="delete.php?id=<?php echo $each['id']?>" class="table-a-delete"><i class="far fa-trash-alt"></i>Xoá</a>
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
                <img src="img/${item.icon}" height="50px">
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