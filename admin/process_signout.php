<?php

session_start();
unset($_SESSION['name']);
unset($_SESSION['id']);
unset($_SESSION['photos']);
unset($_SESSION['level']);
setcookie('token',null,-1);

$_SESSION['success']='Đăng Xuất Thành Công';
header('location:index.php');