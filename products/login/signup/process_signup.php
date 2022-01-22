<?php

require_once "../../url.php";
require_once ROOT_PATH . "products/db/connect.php";


// Validate

session_start();

if (empty($_POST["user_name"])) {
    $_SESSION["error"] = true;
    header("location:index.php");
}
else {
    $email = $_POST["email"];
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
}

if (empty($_POST["phone_number"])) {
    $_SESSION["error"] = true;
    header("location:index.php");
}
else {
    $phone_number = $_POST["phone_number"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$phone_number)) {
        $_SESSION["error"] = true;
        header("location:index.php");
    }
}

if (empty($_POST["password"])) {
    $_SESSION["error"] = true;
    header("location:index.php");
}
else if (empty($_POST["confirm_password"])) {
    $_SESSION["error"] = true;
    header("location:index.php");
}
else {
    if($_POST["confirm_password"] == $_POST["password"]) {
        if(strlen($_POST["confirm_password"]) < 6) {
            $_SESSION["error"] = true;
            header("location:index.php");
        }
        else {
            $password = $_POST["password"];
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z0-9-@_]*$/",$password)) {
                $_SESSION["error"] = true;
                header("location:index.php");
            }
        }
    }
    else {
        $_SESSION["error"] = true;
        header("location:index.php");
    }
}

if (empty($_POST["gender"])) {
    $_SESSION["error"] = true;
    header("location:index.php");
}



if(!isset($_SESSION["error"]) || $_SESSION["error"] == false) {
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
    
}
