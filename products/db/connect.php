<?php

require_once "passSQL.php";

$mysqli = new mysqli(HOST_NAME, USER_NAME, PASS, DATA_BASE, PORT, SOCKET) or die ("Couldn't connect");

if($mysqli->connect_errno) {
    echo "connected false " . $mysqli->connect_error;
    exit();
}
