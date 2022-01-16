<?php

session_start();

$_SESSION["logged_in"] = false;
$_SESSION["email"] = null;
$_SESSION["name"] = null;

unset($_COOKIE["token"]);
unset($_SESSION["logged_in"]);
unset($_SESSION["email"]);
unset($_SESSION["name"]);

setcookie("token", "", time()- 60);

if(isset($_COOKIE["token"])) {
    echo "chua xoa cookie";
}
else {
    echo "da xoa cookie";
}

header("location: ./../products_page/product_lists/index.php");