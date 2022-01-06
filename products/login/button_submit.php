<?php

//https://stackoverflow.com/questions/30515440/html-button-open-link-inside-form

$post_array = filter_input_array(INPUT_POST);
if(isset($post_array['register'])){
    header("location:signup/signup.php");
}
elseif(isset($post_array['login'])){
    require_once "process_login.php";
}
