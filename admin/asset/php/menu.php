            <!-- nav -->
            <div id="nav">
                <i class="ti-menu" onclick="open_menu_sidebar()"></i>
                <a href="../root">
                    <p>Trang Chủ</p>
                </a>
                <a href="#">
                    <p>Liên Hệ</p>
                </a>
                <div id="nav-icon">
                    <label for="check-notification"  id="announcement"><i class="ti-announcement"></i>
                        <input type="checkbox" id="check-notification">
                        <div class="icon-description" id="content-announcement">
                            <div class="header-notification">
                                <h3>Thông Báo</h3>
                            </div>
                            <div class="content-notificaton">
                                <hr>
                                <p>Chuẩn bị nhập hàng</p>
                                <hr>
                                <p>Ngày 24/12 ký hợp đồng với j2team</p>
                                <hr>
                                <p>Ngày 25/12 tuyển dụng nhân viên</p>
                                <hr>
                                <p>Ngày 1/1 Tổng hợp lại 1 năm</p>
                                <hr>
                                <p>...</p>
                                <hr>
                            </div>
                            <div class="footer-notification">
                                <a href="#">Xem Tất Cả</a>
                            </div>
                        </div>

                </label>
                <label for="check-user"  id="user">
                    <i class="far fa-user"></i>
                        <input type="checkbox" id="check-user">
                        <div id="content-user" class="icon-description">
                            <div class="avatar">
                                <img src="../asset/img/avatar/<?php echo $_SESSION['photos'] ?>" alt="avatar">
                                <h3 class="name-avatar"><?php echo $_SESSION['name']?></h3>
                            </div>
                            <hr>
                            <div class="body-content-user">
                                <a href="#">
                                    <div class="body-user hover-manage-user">Quản Lý Tài Khoản</div>
                                </a>
                                <a href="../process_signout.php">
                                    <div class="body-user hover-exit-user">Đăng Xuất</div>
                                </a>
                            </div>
                        </div>
                </label>
                </div>
            </div>
            <!-- menu-sidebar -->
            <div id="menu-sidebar">
                <i class="ti-close close-menu-sidebar" onclick="close_menu_sidebar()"></i>
                <h1>admin</h1>
                <hr>
                <img src="../asset/img/avatar/<?php echo $_SESSION['photos'] ?>" alt="avatar" class="avatar">
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
                    <a href="" target="_blank">
                        <i class="ti-calendar"></i>
                        <h4 class="text-content-menu-sidebar">Sự Kiện</h4>
                    </a>
                </div>
                <div class="content-menu-sidebar">
                    <a href="" target="_blank">
                        <i class="ti-money"></i>
                        <h4 class="text-content-menu-sidebar">Doanh Thu</h4>
                    </a>
                </div>
                <div class="content-menu-sidebar">
                    <a href="../manufactor" target="_blank">
                        <i class="far fa-handshake"></i>
                        <h4 class="text-content-menu-sidebar">Quản Lý Nhà Sản Xuất</h4>
                    </a>
                </div>
                <div class="content-menu-sidebar">
                    <a href="../product" target="_blank">
                        <i class="ti-package"></i>
                        <h4 class="text-content-menu-sidebar">Quản Lý Sản Phẩm</h4>
                    </a>
                </div>
                <div class="content-menu-sidebar">
                    <a href="" target="_blank">
                        <i class="fas fa-users"></i>
                        <h4 class="text-content-menu-sidebar">Quản Lý Khách Hàng</h4>
                    </a>
                </div> 
                <div class="content-menu-sidebar">
                    <a href="../order" target="_blank">
                        <i class="fas fa-users"></i>
                        <h4 class="text-content-menu-sidebar">Quản Lý Đơn Hàng</h4>
                    </a>
                </div> 
                <div class="content-menu-sidebar">
                    <a href="" target="_blank">
                        <i class="fas fa-users"></i>
                        <h4 class="text-content-menu-sidebar">Quản Lý Nhân Viên</h4>
                    </a>
                </div> 
            </div>