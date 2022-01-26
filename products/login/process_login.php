<?php

require_once "../url.php";
require_once ROOT_PATH . "products/db/connect.php";

session_start();

$username = $_POST["user_name"];
$password = $_POST["password"];

// Validate
if (empty($_POST["user_name"])) {
    $_SESSION["error"] = true;
}
else {
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"] = true;
        header("location:index.php");
    }
}
if (empty($_POST["name"])) {
    $_SESSION["error"] = true;
    header("location:index.php");
}
else {
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9-@_]*$/",$name)) {
        $_SESSION["error"] = true;
        header("location:index.php");
    }
}


$query = "SELECT * FROM `customers` 
            WHERE email = '$username'
            AND password = '$password'";

$result = mysqli_query($mysqli, $query);


if (isset($result)){
    $number_row = mysqli_num_rows($result);
    if($number_row == 1) {
        $user = mysqli_fetch_array($result);
        if($user["password"] == $password) {
            $id = $user["id"];
            $_SESSION["userID"] = $id;
            $_SESSION["name"] = $user["name"];
            $_SESSION["phone"] = $user["phone"];
            $_SESSION["adress"] = $user["adress"];
            $_SESSION["logged_in"] = true;

            if(isset($_POST['checkbox']) && !isset($_COOKIE["token"])) {
                $token = uniqid("user_", true);
                $sql = "UPDATE customers SET token = '$token' WHERE id ='$id'";
                $result = mysqli_query($mysqli, $sql);
                _setCookie("token", $token, time() + (86400 * 30));
            }
            header("location:./../product_page/product_list/index.php");
        }
        else {
            $_SESSION["error"] = true;
            header('location:index.php');
        }
    }
    else {
        $_SESSION["error"] = true;
        header("location:index.php");
    }
}
else {
    $_SESSION["error"] = true;
    header("location:index.php");
}
