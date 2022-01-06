<?php
    require_once ROOT_PATH . "products/db/connect.php";
    $query = "SELECT * FROM `products`";
    $result = mysqli_query($mysqli, $query);
    if (!$result){
        die("failed to query");
    }
?>

<link rel="stylesheet" href=<?php echo ROOT_URL . "products/products_page/product_lists/content.css"; ?>>

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
                                <?php $count = 1; foreach($result as $product): ?>
                                    <div class="child_<?php echo $count;?> child_column_4">
                                        <div class="products">
                                            <div class="images">
                                                <a href="#">
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
                                <?php $count++; endforeach; ?>

                            </div>  
                        </div>
                    </article>
                    <!-- pagination -->
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#">1</a>
                        <a href="#" class="active">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
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