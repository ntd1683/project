<?php

define('ROOT_PATH', dirname(__DIR__) . '/');

function url(){
    return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        $_SERVER['REQUEST_URI']
    );
}

define('ROOT_URL', strstr(url(), 'products', true));

function _setCookie(string $name, $value = "", $expires_or_options = 0) {
    setcookie($name, $value, $expires_or_options, strstr($_SERVER['REQUEST_URI'], "products", true) . "products");
}

?>