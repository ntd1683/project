<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết hoá đơn</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="../asset/font/themify-icons/themify-icons.css">
    <!-- css -->
    <link rel="stylesheet" href="../asset/css/detail_order.css">
    <!-- js -->
    
</head>
<body>
     <!-- nav -->
    <div id="nav">
        <a href="index.php">
            <img src="../asset/img/logo/logo.png" alt="logo" class="logo">
        </a>
        <h2 class="header"><i class="ti-pencil-alt"></i>Chi tiết hoá đơn</h2>
    </div>
    <div id="main">
        <div id="container">
            <div id="header">
                <i class="ti-pencil-alt header-margin"></i>
                Chi tiết hoá đơn
            </div>
            <div id="body-container">
            <div id="content-table">
                <table>
                    <tr>
                        <th class="content-table-img">Sản phẩm</th>
                        <th class="content-table-name"></th>
                        <th class="content-table-price">Đơn giá</th>
                        <th class="content-table-quantity">Số lượng</th>
                        <th class="content-table-total">Tổng giá</th>
                    </tr>
                    <tr>
                        <td>
                            <img src="../product/img/1639933877.jpg" alt="ảnh sản phẩm" style="width:100%;">
                        </td>
                        <td>Máy Tính BeagleBone Green Wireless (TI AM335x WiFi+BT) (Sale 30%)</td>
                        <td class="price">1500000</td>
                        <td style="text-align:center;">2</td>
                        <td>3000000</td>
                        
                    </tr>
                    <tr style="text-align:center;color: #707070;background-color:#FAFAFA;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            Tổng <br>
                            Giảm giá <br>
                        </td>
                        <td class="total">
                            <p>3000000 <span>đ</span></p>
                            <p>0 <span>đ</span> </p>
                        </td>
                    </tr>
                    <tr style="text-align:center;color: #707070;font-size:18px;border:0px;background-color:#FAFAFA;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            Tổng chi phí
                        </td>
                        <td class="total-cost">
                            <p>3000000 <span>đ</span></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>