<div id="menu-sidebar">
                <i class="ti-close close-menu-sidebar" onclick="close_menu_sidebar()"></i>
                <h1 style="font-size:30px;">admin</h1>
                <hr>
                <img src="../asset/img/avatar/<?php echo $_SESSION['photos']?>" alt="avatar" class="avatar">
                <h3 class="name-avatar"><?php echo $_SESSION['name'] ?></h3>
                <br>
                <hr>
                <div class="dashboard">
                    <a href="../root">
                        <i class="ti-dashboard"></i>
                        <h3 class="content-dashboard">dashboard</h3>
                    </a>
                </div>
                <hr>
                <br>
                <!-- content menu sidebar -->
                <div class="content-menu-sidebar">
                    <a href="">
                        <i class="ti-calendar"></i>
                        <h4 class="text-content-menu-sidebar">Thông Báo</h4>
                    </a>
                </div>
                <div class="content-menu-sidebar">
                    <a href="">
                        <i class="ti-money"></i>
                        <h4 class="text-content-menu-sidebar">Doanh Thu</h4>
                    </a>
                </div>
                <div class="content-menu-sidebar">
                    <a href="../manufactor">
                        <i class="far fa-handshake"></i>
                        <h4 class="text-content-menu-sidebar">Quản Lý Nhà Sản Xuất</h4>
                    </a>
                </div>
                <div class="content-menu-sidebar">
                    <a href="../product">
                        <i class="ti-package"></i>
                        <h4 class="text-content-menu-sidebar">Quản Lý Sản Phẩm</h4>
                    </a>
                </div>
                <div class="content-menu-sidebar">
                    <a href="../order">
                        <i class="far fa-clipboard"></i>
                        <h4 class="text-content-menu-sidebar">Quản Lý Đơn Hàng</h4>
                    </a>
                </div> 
                <div class="content-menu-sidebar">
                    <a href="../customer">
                        <i class="fas fa-users"></i>
                        <h4 class="text-content-menu-sidebar">Quản Lý Khách Hàng</h4>
                    </a>
                </div> 
                <div class="content-menu-sidebar">
                    <a href="../staff">
                        <i class="fas fa-users"></i>
                        <h4 class="text-content-menu-sidebar">Quản Lý Nhân Viên</h4>
                    </a>
                </div> 
            </div>