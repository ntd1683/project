<?php

require_once "../url.php";
require_once ROOT_PATH . "products/db/connect.php";

$username = $_POST["user_name"];
$password = $_POST["password"];

$query = "SELECT * FROM `customers` 
            WHERE email = '$username'
            AND password = '$password'";

$result = mysqli_query($mysqli, $query);


if (isset($result)){
    $number_row = mysqli_num_rows($result);
    if($number_row == 1) {
        $user = mysqli_fetch_array($result);
        if($user["password"] == $password) {
            session_start();
            echo $user["email"] . "<br>";
            echo $user["password"] . "<br>";
            $_SESSION["email"] = $user["email"];
            $_SESSION["name"] = $user["name"];
            if(isset($_POST['checkbox'])) {
                // setcookie("information", "", time() + (86400 * 30));
            }
            // header("location:./../products_page/product_lists/index.php");
        }
        else {
            session_start();
            $_SESSION["error"] = true;
            header('location:index.php');
        }
    }
    else {
        session_start();
        $_SESSION["error"] = true;
        header("location:index.php");
    }
}
else {
    session_start();
    $_SESSION["error"] = true;
    header("location:index.php");
}
