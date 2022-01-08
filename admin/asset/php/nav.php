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
                                <img src="../asset/img/avatar/<?php echo $_SESSION['photos']?>" alt="avatar">
                                <h3 class="name-avatar"><?php echo $_SESSION['name'] ?></h3>
                            </div>
                            <hr>
                            <div class="body-content-user">
                                <a href="../staff/update.php?id=<?php echo $_SESSION['id'] ?>">
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
            