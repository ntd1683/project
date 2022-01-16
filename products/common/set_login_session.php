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
                $_SESSION["logged_in"] = true;
            }
            else {
                unset($_COOKIE["token"]);
                $_SESSION["logged_in"] = false;
            }
        }
        else {
            unset($_COOKIE["token"]);
            $_SESSION["logged_in"] = false;
        }
    }
    else {
        echo "failed to connect";
    }
}
else {
    $_SESSION["logged_in"] = false;
}
