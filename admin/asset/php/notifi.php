                <div id="notifi">
                    <?php if(isset($_SESSION['success'])){ ?>
                    <div class="check">
                        <i class="ti-check"></i>
                        <p> Thông báo : <?php echo $_SESSION['success']?></p>
                    </div>
                    <?php unset($_SESSION['success']) ?>
                    <?php }?>
                    <?php if(isset($_SESSION['error'])){?>
                    <div class="close">
                        <i class="ti-close"></i>
                        <p> Lỗi : <?php echo $_SESSION['error']?></p>
                    </div>
                    <?php unset($_SESSION['error']) ?>
                    <?php }?>
                </div>