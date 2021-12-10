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
</head>
<body>
    <div id="main">
        <div id="contain">
            <?php include '../asset/php/menu.php' ?>
            <div id="body-contain">
                <h2 class="hello">Chào Admin , Chào mừng bạn trở lại !!!</h2>
                <div id="content">
                    <h3 class="header">Quản Lý Nhà Sản Xuất</h3>
                    <p class="color-text">Quản lý các nhà sản xuất cung cấp hàng</p>
                    <div class="content-search">
                        <i class="ti-search"></i>
                        <form>
                            <input type="search" name="search" class="search" placeholder="Tìm Kiếm Nhà Sản Xuất" id="input-search">
                        </form>
                    </div>
                    <div id="content-table">
                        <table>
                            <tr>
                                <th class="content-table-id">Mã</th>
                                <th class="content-table-name">Tên</th>
                                <th class="content-table-description">Mô Tả Ngắn</th>
                                <th class="content-table-img">Ảnh</th>
                                <th class="content-table-fix">Sửa</th>
                                <th class="content-table-delete">Xoá</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Nguyễn Tấn Dũng</td>
                                <td>Bán Quạt Tản Nhiệt</td>
                                <td>
                                    <img src="../asset/img/avatar/avatar_admin.jpg" alt="Logo Công ty">
                                </td>
                                <td>
                                    <a href="#">Sửa</a>
                                </td>
                                <td>
                                    <a href="#">Xoá</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Xiaomi</td>
                                <td>Bán Đồ Tầm Trung</td>
                                <td>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8kFFPjHr_BtUTFpODxgdMWNUe_w355LKuIA&usqp=CAU" alt="logo">
                                </td>
                                <td>
                                    <a href="#">Sửa</a>
                                </td>
                                <td>
                                    <a href="#">Xoá</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>APPLE</td>
                                <td>Bán Đồ Cao Cấp</td>
                                <td>
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATYAAACjCAMAAAA3vsLfAAAAP1BMVEX///+msbegrLKfq7GjrrXi5efEy8+vub6ps7nv8fL29/istrzf4+XY3d/o6+y7w8jR1tm5wcbN09bCyc3y9PTNNlT3AAACUUlEQVR4nO3c6W6DMBBG0XpswhYIEN7/Wcu+tGnjqSrZSPdIlar8Gn0y48GBfHwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAID/dn9mWegaLqcy4kwZuoqLKVIxgzR0HdeSGzem5h6hC7mUYgptiK0JXcmlZHNqxuahK7mS57LYaG0atV0XWxK6lCtp187GhqCxLjZmXY1E5rVmitCVXEozj2wlqal0Q2xOutBlXEF+r6oqmddXYyXrxn/zZPyQ0e0HVWpFnHNis2aIq8jHzKpW5g9F2nvoCiPUyDrcjh3NPsZZrX7K4VMnrgpdZWT68hDaktH0dyYpG8RBLcaPM33oWuPhndoYHLktiq/X4m/sLXS5sWgVsVmO3haJfZ/WlhpDyKr0T02YQFaK/cDR1zY3/87GEdJOcYnS2Da9YkMIXWtEEu/WRmc7aLxbm+Ma3XXesQlHbjv/jVS4G90R258oYqtD1xoR/97GlnCg2EkZQHaV4tQodK0RUdzJc3O1KxQ3V9zK7/xTo7sdPBTNjWPKjWZPILeN5uRoyI3rdKH4LmHgMm4WJv4D74xvryaaEWRab6ELjsRTtdyYQha5arlZzo8WmtGNx+03veKJIxbbTnHoRmc7yN4HtsQWutKo1J67Aq9fnXVe7Y1L9KvUo7053pD8xme18Zz4N/375cbs8ULvTq9ulG2bnd7myFhrLy2/XmGMuNt8OlTcH2tw0gauLmKVsSL29HJVMb2KZUsmj9/k9YvnivKa6xMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAsPoElgcQiyXfWy4AAAAASUVORK5CYII=" alt="logo">
                                </td>
                                <td>
                                    <a href="#">Sửa</a>
                                </td>
                                <td>
                                    <a href="#">Xoá</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="footer">
                        <a href="#"><div class="page color-text">1</div></a>
                        <a href="#"><div class="page color-text">2</div></a>
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
</body>
</html>