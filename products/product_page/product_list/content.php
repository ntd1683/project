<?php
    $quantity = 8;
    require_once ROOT_PATH . "products/db/connect.php";

    if(isset($_GET["sort_by"])) {
        if($_GET["sort_by"] == "price_asc") {
            $sort_by_price_asc = "SELECT * FROM products ORDER BY price ASC";
            $result = mysqli_query($mysqli, $sort_by_price_asc);
        }
        else if($_GET["sort_by"] == "price_desc") {
            $sort_by_price_desc = "SELECT * FROM products ORDER BY price DESC";
            $result = mysqli_query($mysqli, $sort_by_price_desc);
        }
    }
    else {
        $query = "SELECT * FROM `products`";
        $result = mysqli_query($mysqli, $query);
    }

    if (!$result){
        die("failed to query");
    }
    $number_row = mysqli_num_rows($result);
    $pagination = ceil($number_row / $quantity);

?>

<link rel="stylesheet" href=<?php echo ROOT_URL . "products/product_page/product_list/content.css"; ?>>

    <!-- content -->
    <div>
        <div id="below_menubar" style="padding-top:75px;">
            <div class="main box_container">
                <div class="content">
                    <article id="article1" class="article">
                        <div class="article_title">
                            <h2>loại sản phẩm</h2>
                        </div>
                        <div class="wrapper">
                            <div class="column_4 product_list">
                                <?php $count = 1;
                                    if(isset($_GET["page"])) {
                                        $begin = $quantity * ($_GET["page"]-1);
                                        $end = $quantity * $_GET["page"];
                                    }
                                    else {
                                        $begin = 0;
                                        $end = $quantity;
                                    }
                                    foreach($result as $product): 
                                        if($count > $begin && $count <= $end):
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
                                <?php 
                                        endif;
                                    $count++;
                                    endforeach; 
                                ?>
                                
                            </div>
                        </div>
                    </article>
                    <!-- pagination -->
                    <div class="pagination">
                        <a href="?page=<?php echo 1;?>">&laquo;</a>
                        <?php for($count = 1; $count <= $pagination; $count++): ?>
                            <a href="?page=<?php echo $count;?>" 
                                <?php 
                                if(isset($_GET["page"])) {
                                    if($_GET["page"] == $count) echo "class=active";
                                    else ;
                                }
                                else {
                                    if($count == 1) echo "class=active";
                                }
                                ?>>
                                <?php echo $count; ?>
                            </a>
                            <!-- <a href="#" class="active">2</a> -->
                        <?php endfor; ?>
                        <a href="?page=<?php echo $pagination;?>">&raquo;</a>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <?php require_once ROOT_PATH . "products/common/footer.php"; ?>
    </body>
</html>

<?php
mysqli_free_result($result);
mysqli_close($mysqli);
?>