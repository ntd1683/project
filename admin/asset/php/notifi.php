
                <script>
                    <?php if(isset($_SESSION['success'])){ ?>
                    var check = `<?php echo $_SESSION['success'] ?>`;
                    $(document).ready(function () {
                        console.log(1);
                            console.log(check);
                            $.notify(check, "success");
                    });                   
                    <?php unset($_SESSION['success']) ?>
                    <?php }?>
                    <?php if(isset($_SESSION['error'])){ ?>
                    var check = `<?php echo $_SESSION['error'] ?>`;
                    $(document).ready(function () {
                        console.log(1);
                            console.log(check);
                            $.notify(check, "error");
                    });                   
                    <?php unset($_SESSION['error']) ?>
                    <?php }?>
                </script>