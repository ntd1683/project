<?php

require_once "../url.php";
session_start();
if(!isset($_SESSION["logged_in"])) {
    require_once ROOT_PATH . "products/common/set_login_session.php";
}

if($_SESSION["logged_in"] == true) {
    header("location:./../product_page/product_list/index.php");
}
else {
    require_once "login.php";
}
