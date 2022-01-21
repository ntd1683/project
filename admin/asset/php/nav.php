            <!-- nav -->
            
    <script defer src="../asset/js/menu.js"></script>
            <div id="nav">
                <i class="ti-menu" onclick="open_menu_sidebar()"></i>
                <a href="../root">
                    <p>Trang Chủ</p>
                </a>
                <a href="#">
                    <p>Liên Hệ</p>
                </a>
                <?php
                require_once '../connect.php';
                $sql_notifi = "SELECT * FROM `notifi` WHERE `pin` = 1 ORDER by pin DESC";
                $result_notifi = mysqli_query($connect,$sql_notifi);
                $sql_count_notifi ="SELECT count(*) as count FROM `notifi` WHERE pin = 1";
                $result_count_notifi = mysqli_query($connect,$sql_count_notifi);
                $count_notifi = mysqli_fetch_array($result_count_notifi)['count'];
                ?>
                <div id="nav-icon">
                    <label for="check-notification"  id="announcement"><i class="ti-announcement" id="icon_announcement" style="position: relative;" onclick="btn_announcement()"><span class="count_notifi"><?php echo $count_notifi ?></span></i>
                        <input type="checkbox" id="check-notification">
                        <div class="icon-description" id="content-announcement">
                            <div class="header-notification">
                                <h3>Thông Báo</h3>
                            </div>
                            <!-- notifi -->
                            <div class="content-notificaton">
                                <hr>
                                <?php foreach($result_notifi as $each_notifi):?>
                                <img src="../staff/img/<?php echo $each_notifi['photos'] ?>" alt="avatar <?php echo $each_notifi['name'] ?>" class="nav-avatar" title="Do <?php echo $each_notifi['name']?> đăng">
                                <p><?php echo $each_notifi['detail'] ?></p>
                                <hr>
                                <?php endforeach ?>
                                <p>...</p>
                                <hr>
                            </div>
                            <div class="footer-notification">
                                <a href="../notifi">Xem Tất Cả</a>
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
            