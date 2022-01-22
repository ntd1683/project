<?php

session_start();

require_once "../url.php";

$_SESSION["logged_in"] = false;
$_SESSION["email"] = null;
$_SESSION["name"] = null;

_setCookie("token", "", time()- 60);

unset($_COOKIE["token"]);
unset($_SESSION["logged_in"]);
unset($_SESSION["email"]);
unset($_SESSION["name"]);


if(isset($_COOKIE["token"])) {
    echo "chua xoa cookie";
}
else {
    echo "da xoa cookie";
}

header("location: ./../product_page/product_list/index.php");