<?php 
    if(isset($_COOKIE['card']) && $_COOKIE['card'] != null) {
        $GLOBALS["card"] = json_decode($_COOKIE["card"], true);

        // delete button
        if(isset($_POST["delete_product"])) {
            foreach($card as $productID => $element) {
                if($_POST["delete_product"] == $productID) {
                    echo $_POST["delete_product"];
                    echo "fasdfsdf ";
                    unset($card["$productID"]);
                    _setCookie('card', json_encode($card), time()+3600*24*5);
                }
            }
        }
    }

?>
<link rel="stylesheet" href="content.css">

<div class="below_menubar box_container" style="padding-top:75px;">
    <div class="column_2">
        <div class="left_column child_column_2">
            <div class="main_content">
                <div class="header">
                    đơn hàng của bạn
                </div>

                <?php if(isset($card)): ?>
                    <div class="column_ title">
                        <div class="column_4">
                            <div class="child_1 child_column_4">
                                sản phẩm
                            </div>
                            <div class="child_2 child_column_4">
                                
                            </div>
                            <div class="child_3 child_column_4">
                                đơn giá 
                            </div>
                            <div class="child_4 child_column_4">
                                thành tiền
                            </div>
                        </div>
                    </div>
                    <div class="column_product column_">
                        <?php foreach($card as $productID => $element): ?>
                            <div class="column_4">
                                <div class="child_1 child_column_4">
                                    <a href="product_image">
                                        <img width="80" height="80" src="<?php echo $element[3]; ?>" alt="">
                                    </a>
                                </div>
                                <div class="child_2 child_column_4">
                                    <span><?php echo $element[1]; ?></span>
                                    <div class="remove_and_add_wish_list">
                                        <p>số lượng: <?php echo $element[0] ?></p>
                                        <form action="" method="post">
                                            <!-- <p style="color:red">xoá</p> -->
                                            <button style="color:red;background-color:white;" type="submit" name="">xoá</button>
                                            <input type="text" name="delete_product" id="" style="visibility:hidden;" value="<?php echo $productID; ?>">
                                        </form>
                                    </div> 
                                </div>
                                <div class="child_3 child_column_4">
                                    <?php echo number_format($element[2], 0, '.', '.'); ?>
                                </div>
                                <div class="child_4 child_column_4">
                                    <?php 
                                        echo number_format($element[2] * $element[0], 0, '.', '.'); 
                                    ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php else: ?>
                        không có sản phẩm trong giỏ hàng
                    <?php endif ?>
            </div>
        </div>
        <div class="right_column child_column_2">
            <div class="size_bar">
                <div class="costs">
                    tổng tiền:
                    <?php 
                        $Price = 0;
                        foreach($card as $price) {
                            $Price += $price[2] * $price[0];
                        } 
                        echo number_format($Price, 0, '.', '.');
                    ?> 
                </div>
                <form action="">
                    <button name="submit_button" type="submit" class="submit_button">
                        mua hàng
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>