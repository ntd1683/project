<?php
if(!isset($_SESSION['level'])){
    $_SESSION['error']="Lỗi bạn chưa đăng nhập";
    header('location:../index.php');
    exit;
}