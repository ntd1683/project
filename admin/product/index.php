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

$sql_products = "select count(*) from products  where name like '%$search%'";
$arr_products = mysqli_query($connect,$sql_products);
$result_products = mysqli_fetch_array($arr_products);
$total_products = $result_products['count(*)'];

$product_in_page = 5;
$total_page = ceil($total_products/$product_in_page);
$skip_page = $product_in_page*($page-1);

$sql = "select products.*,manufactors.name as name_manufactors from products
join manufactors on products.id_manufactors = manufactors.id
where products.name like '%$search%' limit $product_in_page offset $skip_page";
$result = mysqli_query($connect,$sql);

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
    <link rel="stylesheet" href="../asset/css/notifi.css">
    <link rel="stylesheet" href="../asset/css/style_product.css">
    <!-- js -->
    <script defer src="../asset/js/notifi.js"></script>
</head>
<body>
    <div id="main">
        <div id="contain">
        <?php include '../asset/php/nav.php'?>
            <?php include '../asset/php/menu_sidebar.php'?>
            <div id="body-contain">
                <h2 class="hello">Chào Admin , Chào mừng bạn trở lại !!!</h2>
                <?php include '../asset/php/notifi.php' ?>
                <div id="content">
                    <h3 class="header">Quản Lý Sản Phẩm</h3>
                    <p class="color-text">Quản lý các sản phẩm tiêu dùng</p>
                    <div class="content-search">
                        <label for="input-search"><i class="ti-search"></i></label>
                        <form>
                            <input type="search" name="search" class="search" placeholder="Tìm Kiếm Sản Phẩm" id="input-search" value="<?php echo $search ?>">
                        </form>
                        <div class="add">
                            <a href="insert.php" id="a-add">
                                <i class="ti-plus"></i>
                                <p>Thêm Sản Phẩm</p>
                            </a>
                        </div>
                    </div>
                    <div id="content-table">
                        <table>
                            <tr>
                                <th class="content-table-id">Mã</th>
                                <th class="content-table-name">Tên</th>
                                <th class="content-table-manufactor">Tên Nhà Sản Xuất</th>
                                <th class="content-table-img">Ảnh</th>
                                <th class="content-table-fix">Sửa</th>
                                <th class="content-table-delete">Xoá</th>
                            </tr>
                            <?php foreach($result as $each) : ?>
                            <tr>
                                <td><?php echo $each['id']?></td>
                                <td><?php echo $each['name']?></td>
                                <td><?php echo $each['name_manufactors']?></td>
                                <td>
                                    <img src="img/<?php echo $each['photos']?>" alt="Ảnh sản phẩm" style="width:150px;">
                                </td>
                                <td>
                                    <a href="update.php?id=<?php echo $each['id']?>" class="table-a-fix"><i class="ti-check-box"></i> Sửa</a>
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
</body>
</html>