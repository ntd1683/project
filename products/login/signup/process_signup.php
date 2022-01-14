<?php

require_once "../../url.php";
require_once ROOT_PATH . "products/db/connect.php";

$name = $_POST["name"];
$first_name = $_POST["first_name"];
$phone_number = $_POST["phone_number"];
$email = $_POST["email"];
$password = $_POST["password"];
$gender = $_POST["gender"];

$query = "SELECT count(*) FROM `customers` 
            WHERE email = '$email'";

$result = mysqli_query($mysqli, $query);

$number_row = mysqli_fetch_array($result)['count(*)'];

if($number_row == 1) {
    echo "trùng email";
}
elseif($number_row == 0) {
    $full_name = $first_name . $name;
    $insert = "INSERT INTO customers(name, gender, email, password, phone)
                value('$full_name', '$gender', '$email', '$password', '$phone_number')";
    $result = mysqli_query($mysqli, $insert);
    if(isset($result)) {
        echo "dang ki thanh cong";
        header('location:./../index.php');
    }
    else {
        echo "dang ki that bai";
    }
}
