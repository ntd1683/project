<?php

use LDAP\Result;

require_once "../url.php";
require_once ROOT_PATH . "products/db/connect.php";

if(!isset($_SESSION)) { 
    session_start();
}

$order_id = $_POST["ord_id"];

$query = "SELECT id_customers FROM orders WHERE id='$order_id'";
$result = mysqli_query($mysqli, $query);
$customer_id = mysqli_fetch_array($result);

if($customer_id["id_customers"] == $_SESSION["userID"]) {
    $query = "DELETE FROM orders WHERE id = '$order_id'";
    $result = mysqli_query($mysqli, $query);
    $query = "DELETE FROM orders_products WHERE id_orders = '$order_id'";
    $result = mysqli_query($mysqli, $query);

    header("location: index.php");
}
else {
    header("location: delete_err.php");
}


