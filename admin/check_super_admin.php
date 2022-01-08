<?php
if(empty($_SESSION['level'])){
    $_SESSION['error']="Lỗi bạn chưa đăng nhập hoặc bạn không có quyền";
    header('location:../index.php');
    exit;
}