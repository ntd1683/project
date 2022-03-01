
<?php 
    require ROOT_PATH . "products/db/connect.php";
    require "get_order.php";

    $id = $_SESSION["userID"];
    // $query = "SELECT * FROM `orders` WHERE id_customers='$id' AND status=1";
    // $result = mysqli_query($mysqli, $query);
    $approved ;
    $orders = get_order();
    $purchased = get_order_product(1);
?>

    <link rel="stylesheet" href=<?php echo ROOT_URL . "products/profile/content.css"; ?>>
    <!-- content -->
    <div>
        <div id="below_menubar" style="padding-top:75px;">
            <div class="main box_container">
                <div class="content">
                    <div class="main-content";>
                        <div class="photo">
                            <div class="cover_photo">
                                
                            </div>
                            <div class="profile_photo">
                                
                            </div>
                        </div>
                            <div class="user_info">
                            <button class="tablink" onclick="openPage('info', this, 'rgb(105, 105, 105)')">thông tin cá nhân</button>
                            <button class="tablink" onclick="openPage('order', this, 'rgb(105, 105, 105)')" id="defaultOpen">đơn hàng</button>
                            <button class="tablink" onclick="openPage('purchased', this, 'rgb(105, 105, 105)')">sản phẩm đã mua</button>
                            
                            <div id="info" class="tabcontent">
                                <form action="change_info.php" method="post">
                                    <h3>thông tin</h3>
                                    <input type="text" style="visibility:hidden;" name="user_id" id="user_id" value="<?php echo $_SESSION["userID"]; ?>"><br>
                                    <span>tên: </span>
                                    <input type="text" class="text_input" name="user_name" id="user_name" value="<?php echo $_SESSION["name"]; ?>"><br>
                                    <span>SĐT: </span>
                                    <input type="text" class="text_input" name="user_phone" id="user_phone" value="<?php echo $_SESSION["phone"]; ?>"><br>
                                    <span>địa chỉ</span>
                                    <input type="text" class="text_input" name="user_adr" id="user_adr" value="<?php echo $_SESSION["adress"]; ?>"><br>
                                    <div class="_button">
                                        <button type="submit" class="submit_button">xác nhận</button>
                                    </div>
                                </form>

                            </div>

                            <div id="purchased" class="tabcontent">
                                <div>
                                    <h2>sản phẩm đã mua</h2>
                                    <div class="column_4 product_list">
                                        <?php 
                                            $count=1;
                                            foreach($purchased as $productID => $quantity):
                                        ?>
                                            <?php 
                                                $query = "SELECT * FROM `products` WHERE id='$productID'";
                                                $result = mysqli_query($mysqli, $query);
                                                $product = mysqli_fetch_array($result);
                                            ?>
                                            <div class="child_<?php echo $count;?> child_column_4">
                                                <div class="products">
                                                    <div class="images">
                                                        <a href="<?php echo ROOT_URL . "products/product_page/product_detail/index.php?product=" . $product['id']; ?>">
                                                            <img src="<?php echo ROOT_URL . "admin/product/img/" . $product['photos']; ?>" alt="<?php echo $product['name'];?>">
                                                        </a>
                                                    </div>
                                                    <a class="product_name" href="#">
                                                        <p style="margin-top:10px;margin-bottom:10px;font-size: 14px;">
                                                            <?php echo $product['name']; ?>
                                                        </p>
                                                    </a>
                                                    <div class="price">
                                                        <h2> <?php echo number_format($product['price'], 0, '.', '.'); ?></h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $count++ ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <div id="order" class="tabcontent">
                                <div class="ordering">
                                    <div class="approving">
                                        <h2>đang chờ xét duyệt</h2>
                                        <?php foreach($orders as $order): ?>
                                            <?php if($order["status"] == 0 && count($order["products"]) >= 1): ?>
                                            <div class="wrap_box">
                                                <div class="column_4 box_product">
                                                    <div class="child_1 child_column_4">
                                                    </div>
                                                    <div class="child_2 child_column_4">
                                                        sản phẩm
                                                    </div>
                                                    <div class="child_3 child_column_4">
                                                        số lượng
                                                    </div>
                                                    <div class="child_4 child_column_4">
                                                        giá
                                                    </div>
                                                </div>
                                                <div id="hidden">
                                                    <p id="count" style="visibility: hidden;"><?php echo count($order["products"]); ?></p>
                                                    <?php $count = 0;
                                                    foreach($order["products"] as $products): 
                                                    ?>
                                                    <div class="wrap_product wrap_product_<?php echo $count?>">
                                                        <div class="column_4 box_product">
                                                            <div class="child_1 child_column_4">
                                                                <div class="image">
                                                                <a href="<?php echo ROOT_URL . "products/product_page/product_detail/index.php?product=" . $products['id']; ?>">
                                                                    <img src="<?php echo ROOT_URL . "admin/product/img/" . $products['photo']; ?>" alt="<?php echo $products['name'];?>">
                                                                </a>
                                                                </div>
                                                            </div>
                                                            <div class="child_2 child_column_4">
                                                                <?php echo $products["name"]; ?>
                                                            </div>
                                                            <div class="child_3 child_column_4">
                                                                <?php echo $products["quantity"]; ?>
                                                            </div>
                                                            <div class="child_4 child_column_4">
                                                                <?php echo number_format($products["price"]*$products["quantity"], 0, '.', '.'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $count++; endforeach; ?>
                                                    <div class="column_2 desciption">
                                                        <div class="left_column child_column_2">
                                                            <span class="order_desciption">thời gian đặt hàng: </span>
                                                            <span class="order_desciption"><?php echo $order["time_order"] ?></span> <br>
                                                            <span class="order_desciption">số điện thoại nhận hàng: </span>
                                                            <span class="order_desciption"><?php echo $order["phone_receiver"] ?></span> <br>
                                                            <span class="order_desciption">địa chỉ nhận hàng: </span>
                                                            <span class="order_desciption"><?php echo $order["adress_receiver"] ?></span> <br>
                                                        </div>
                                                        <div class="right_column child_column_2">
                                                            <span class="order_desciption">tổng tiền: </span>
                                                            <span class="order_desciption price"><?php echo number_format($order["total_price"], 0, '.', '.'); ?></span> <br>
                                                            <form action="process_delete.php" method="post">
                                                                <input style="visibility: hidden;" type="text" id="ord_id" name="ord_id" value="<?php echo $order["id_order"]; ?>">
                                                                <div class="wrap_button">
                                                                    <button type="submit" class="button">huỷ đơn hàng</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="approved">
                                        <h2>đã xét duyệt</h2>
                                        <?php foreach($orders as $order): ?>
                                            <?php if($order["status"] == 1 && count($order["products"]) >= 1): ?>
                                            <div class="wrap_box">
                                                <div class="column_4 box_product">
                                                    <div class="child_1 child_column_4">
                                                    </div>
                                                    <div class="child_2 child_column_4">
                                                        sản phẩm
                                                    </div>
                                                    <div class="child_3 child_column_4">
                                                        số lượng
                                                    </div>
                                                    <div class="child_4 child_column_4">
                                                        giá
                                                    </div>
                                                </div>
                                                <!-- <div id="read_more">
                                                    xem them
                                                </div>
                                                <div id="read_less">
                                                    an bot
                                                </div> -->
                                                <div id="hidden">
                                                    <p id="count" style="visibility: hidden;"><?php echo count($order["products"]); ?></p>
                                                    <?php $count = 0;
                                                    foreach($order["products"] as $products): 
                                                    ?>
                                                    <div class="wrap_product wrap_product_<?php echo $count?>">
                                                        <div class="column_4 box_product">
                                                            <div class="child_1 child_column_4">
                                                                <div class="image">
                                                                    <a href="<?php echo ROOT_URL . "products/product_page/product_detail/index.php?product=" . $products['id']; ?>">
                                                                        <img src="<?php echo ROOT_URL . "admin/product/img/" . $products['photo']; ?>" alt="<?php echo $products['name'];?>">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="child_2 child_column_4">
                                                                <?php echo $products["name"]; ?>
                                                            </div>
                                                            <div class="child_3 child_column_4">
                                                                <?php echo $products["quantity"]; ?>
                                                            </div>
                                                            <div class="child_4 child_column_4">
                                                                <?php echo number_format($products["price"]*$products["quantity"], 0, '.', '.'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $count++; endforeach; ?>
                                                    <div class="column_2 desciption">
                                                        <div class="left_column child_column_2">
                                                            <span class="order_desciption">thời gian đặt hàng: </span>
                                                            <span class="order_desciption"><?php echo $order["time_order"] ?></span> <br>
                                                            <span class="order_desciption">số điện thoại nhận hàng: </span>
                                                            <span class="order_desciption"><?php echo $order["phone_receiver"] ?></span> <br>
                                                            <span class="order_desciption">địa chỉ nhận hàng: </span>
                                                            <span class="order_desciption"><?php echo $order["adress_receiver"] ?></span> <br>
                                                        </div>
                                                        <div class="right_column child_column_2">
                                                            <span class="order_desciption">tổng tiền: </span>
                                                            <span class="order_desciption price"><?php echo number_format($order["total_price"], 0, '.', '.'); ?></span> <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    // https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_full_page_tabs
                    function openPage(pageName,elmnt,color) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablink");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].style.backgroundColor = "";
                        }
                        document.getElementById(pageName).style.display = "block";
                        elmnt.style.backgroundColor = color;
                    }
                    // Get the element with id="defaultOpen" and click on it
                    document.getElementById("defaultOpen").click();
                </script>
            </div>
            <!-- footer -->
            <?php require_once ROOT_PATH . "products/common/footer.php"; ?>
        </div>
    </div>

</body>
</html>


