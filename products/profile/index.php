<?php


require_once "../url.php";

if(!isset($_SESSION)) { 
    session_start();
}

if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
    require_once ROOT_PATH . "products/common/header.php";
    require_once "content.php";
}
else {
    require_once "warning.php";
}