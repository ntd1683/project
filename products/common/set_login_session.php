<?php

if(isset($_COOKIE["token"])) {
    require_once ROOT_PATH . "products/db/connect.php";

    $token = $_COOKIE["token"];
    
    $query = "SELECT * FROM customers WHERE token='$token'";
    $result = mysqli_query($mysqli, $query);
    $user = mysqli_fetch_array($result);

    if(isset($result)) {
        $number_row = mysqli_num_rows($result);
        if($number_row == 1) {
            $dbtoken = mysqli_fetch_array($result);
            if($dbtoken["token"] == $token) {
                $_SESSION["logged_in"] = true;
                $_SESSION["userID"] = $user["id"];
                $_SESSION["name"] = $user["name"];
                $_SESSION["phone"] = $user["phone"];
                $_SESSION["adress"] = $user["adress"];
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
