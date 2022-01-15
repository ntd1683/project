<?php

if(isset($_COOKIE["token"])) {
    require_once "../url.php";
    require_once ROOT_PATH . "products/db/connect.php";

    $token = $_COOKIE["token"];
    
    $query = "SELECT token FROM customers WHERE token='$token'";
    $result = mysqli_query($mysqli, $query);

    if(isset($result)) {
        $number_row = mysqli_num_rows($result);
        if($number_row == 1) {
            $dbtoken = mysqli_fetch_array($result);
            if($dbtoken["token"] == $token) {
                header("location:./../products_page/product_lists/index.php");
            }
            else {
                unset($_COOKIE["token"]);
                require_once "login.php";
            }
        }
        else {
            unset($_COOKIE["token"]);
            require_once "login.php";
        }
    }
    else {
        echo "failed to connect";
    }
}
else {
    require_once "login.php";
}


