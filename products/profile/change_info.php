<?php

use LDAP\Result;

require_once "../url.php";
require_once ROOT_PATH . "products/db/connect.php";

if(!isset($_SESSION)) { 
    session_start();
}

$user_id = $_POST["user_id"];
$user_name = $_POST["user_name"];
$user_phone = $_POST["user_phone"];
$user_adr = $_POST["user_adr"];

if($user_id == $_SESSION["userID"]) {
    $query = "UPDATE customers SET name='$user_name', phone='$user_phone', adress='$user_adr' WHERE id = '$user_id'";
    $result = mysqli_query($mysqli, $query);

    $_SESSION["name"] = $user_name;
    $_SESSION["phone"] = $user_phone;
    $_SESSION["adress"] = $user_adr;

    header("location: index.php");
}
else {
    header("location: delete_err.php");
}
