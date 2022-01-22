<?php 
    require_once ROOT_PATH . "products/db/connect.php";
    // get product
    if(isset($_GET["product"])) {
        $id = $_GET["product"];
        $query = "SELECT * FROM `products` WHERE id='$id'";
        $result = mysqli_query($mysqli, $query);
        $number_row = mysqli_num_rows($result);
        if (isset($result)){
            if($number_row == 1) {
                $GLOBALS['product'] = mysqli_fetch_array($result);
            }
            else {
                echo 404;
                exit;
            }
        }
        else {
            echo 404;
            exit;
        }
    }
    else {
        echo 404;
        exit;
    }

    // add to card
    if(isset($_POST["add_to_card"])) {
        if(isset($_COOKIE['card']) && $_COOKIE['card'] != null) {
            $card = json_decode($_COOKIE['card'], true);
            if(isset($card[$_GET["product"]])) {
                $card[$_GET["product"]][0] += $_POST["quantity"];
            }
            else {
                $card[$_GET["product"]] = array($_POST["quantity"], $product["name"], $product["price"], ROOT_URL . "admin/product/img/" . $product['photos']);
            }
        }
        else {
            // set cookie
            // quantity, name, price, image
            $card = array($_GET["product"] => array($_POST["quantity"], $product["name"], $product["price"], ROOT_URL . "admin/product/img/" . $product['photos']));
        }

        _setCookie('card', json_encode($card), time()+3600*24*5);

        header("location: ./../../card/index.php");
    }

?>


    <link rel="stylesheet" href=<?php echo ROOT_URL . "products/product_page/product_detail/product_content.css"; ?>>
    <!-- content -->
    <div>
        <div id="below_menubar" style="padding-top:75px;">
            <div class="main box_container">
                <div class="content">
                    <div class="main-content";>
                        <div class="title">
                            <h4> thể loại > ... > ... > tên sản phẩm </h4>
                        </div>
                        <div class="column_2">
                            <div class="left_column child_column_2 gallery">
                                <div class="column_2">
                                    <div class="left_column child_column_2">
                                        <div class="img-zoom-container">
                                            <img id="image" width="400" height="400" src="<?php echo ROOT_URL . "admin/product/img/" . $product['photos']; ?>" alt="<?php echo $product['name'];?>">
                                        </div>
                                    </div>
                                    <div class="right_column child_column_2">
                                        <div id="myresult" class="img-zoom-result"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="right_column child_column_2">
                                <div class="product_name">
                                    <h2><?php echo $product["name"]; ?></h2>
                                </div>
                                <div class="summary">
                                    <ul>
                                        <li>Loại sản phẩm: </li>
                                        <li>Hãng sản xuất: </li>
                                        <li>Bảo hành: </li>
                                    </ul>
                                </div>
                                <div class="price">
                                    <span style="display:inline;">giá: </span>
                                    <span style="display:inline; color: red;font-size:24px;"><?php echo number_format($product['price'], 0, '.', '.') . " vnđ"; ?></span>
                                </div>

                                <form method="post" action="">
                                    <div class="wrap_quantity">
                                        số lượng:
                                        <input type="number" id="quantity" name="quantity" min="1" max="200" value="1">
                                    </div>
                                    <div class="wrap_button">
                                        <div class="bar">
                                            <button name="add_to_card" type="submit" class="button add_to_card_button">thêm vào giỏ hàng</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <script>
                                function imageZoom(imgID, resultID) {
                                    var img, lens, result, cx, cy;
                                    img = document.getElementById(imgID);
                                    result = document.getElementById(resultID);
                                    /*create lens:*/
                                    lens = document.createElement("DIV");
                                    lens.setAttribute("class", "img-zoom-lens");
                                    /*insert lens:*/
                                    img.parentElement.insertBefore(lens, img);
                                    /*calculate the ratio between result DIV and lens:*/
                                    cx = 350 / lens.offsetWidth;
                                    cy = 350 / lens.offsetHeight;
                                    /*set background properties for the result DIV:*/
                                    result.style.backgroundImage = "url('" + img.src + "')";
                                    result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
                                    /*execute a function when someone moves the cursor over the image, or the lens:*/
                                    lens.addEventListener("mousemove", moveLens);
                                    img.addEventListener("mousemove", moveLens);
                                    /*and also for touch screens:*/
                                    lens.addEventListener("touchmove", moveLens);
                                    img.addEventListener("touchmove", moveLens);
                                    function moveLens(e) {
                                        var pos, x, y;
                                        /*prevent any other actions that may occur when moving over the image:*/
                                        e.preventDefault();
                                        /*get the cursor's x and y positions:*/
                                        pos = getCursorPos(e);
                                        /*calculate the position of the lens:*/
                                        x = pos.x - (lens.offsetWidth / 2);
                                        y = pos.y - (lens.offsetHeight / 2);
                                        /*prevent the lens from being positioned outside the image:*/
                                        if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
                                        if (x < 0) {x = 0;}
                                        if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
                                        if (y < 0) {y = 0;}
                                        /*set the position of the lens:*/
                                        lens.style.left = x + "px";
                                        lens.style.top = y + "px";
                                        /*display what the lens "sees":*/
                                        result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
                                    }
                                    function getCursorPos(e) {
                                        var a, x = 0, y = 0;
                                        e = e || window.event;
                                        /*get the x and y positions of the image:*/
                                        a = img.getBoundingClientRect();
                                        /*calculate the cursor's x and y coordinates, relative to the image:*/
                                        x = e.pageX - a.left;
                                        y = e.pageY - a.top;
                                        /*consider any page scrolling:*/
                                        x = x - window.pageXOffset;
                                        y = y - window.pageYOffset;
                                        return {x : x, y : y};
                                    }
                                }
                            </script>
                            <script>
                                imageZoom("image", "myresult");
                            </script>
                        </div>
                        <div class="description">
                            <div class="btn_group">
                                <button class="btnlinks" onclick="openTab('table_desc')">cấu hình sản phẩm</button>
                                <button class="btnlinks" onclick="openTab('descriptive_details')">mô tả chi tiết</button>
                            </div>
                            <div id="table_desc" class="tab tabcontent" style="display:block">
                                <table class="table_description">
                                    <tr>
                                        <td>Nhà sản xuất</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Model</td>
                                        <td>B</td>
                                    </tr>
                                    <tr>
                                        <td>Điện áp</td>
                                        <td>C</td>
                                    </tr>
                                </table>
                            </div>

                            <div id="descriptive_details" class="tab tabcontent" style="display:none">
                                <h2>mô tả chi tiết</h2>
                                <p>Ram Kingston DDR4 - đáp ứng mọi nhu cầu của mọi nền tảng máy tính. Tự động nhận dạng các nền tảng được cắm vào, không cần phải điều chỉnh bất kì thiết lập nào trong hệ thống BIOS. Vì vậy, bạn sẽ có được hiệu suất cực cao nhờ các công nghệ của các bộ xử lý AMD hoặc các công nghệ Intel CPU mới nhất một cách dễ dàng - ngay cả khi bạn là một Newbie. Ram Kingston DDR4 mang đến cho bạn trải nghiệm cực tốt khi chơi Games hay dùng những chương trình nặng mà vẫn giữ hệ thống của bạn mát mẻ. Được thiết kế với điện áp thấp ở 1.2V cho tiêu thụ điện năng ít hơn, giảm sinh nhiệt và hoạt động yên tĩnh. Kiểu dáng mỏng đẹp làm nổi bật hệ thống máy tính của bạn.Nổi trội hơn hết, Ram Kingston DDR4 mang lại hiệu năng cao với chi phí thấp. Được bảo hành 3 năm chính hãng và hỗ trợ kỹ thuật miễn phí với độ tin cậy huyền thoại.</p>
                            </div>

                            <script>
                                function openTab(tabName) {
                                    var i;
                                    var x = document.getElementsByClassName("tab");
                                    for (i = 0; i < x.length; i++) {
                                        x[i].style.display = "none";  
                                    }
                                    document.getElementById(tabName).style.display = "block";  
                                }
                            </script>

                        </div>
                        <div class="rating">
                            đánh giá
                        </div>
                        <div class="comment">
                            bình luận
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <?php require_once ROOT_PATH . "products/common/footer.php"; ?>
        </div>
    </div>



</body>
</html>


