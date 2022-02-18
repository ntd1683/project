            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    window.addEventListener('load', () => {
                    window.setTimeout(() => {
                            <?php if(isset($_SESSION['success'])){ ?>
                                $.notify("<?php echo $_SESSION['success']?>", "success");
                                <?php unset($_SESSION['success']) ?>
                            <?php }?>
                            <?php if(isset($_SESSION['error'])){?>
                                $.notify("<?php echo $_SESSION['error']?>", "error");
                                <?php unset($_SESSION['error']) ?>
                            <?php }?> 
                        }, 100);
                    });
                </script>