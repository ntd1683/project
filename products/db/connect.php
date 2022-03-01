<?php

$HOST_NAME = "localhost";
$USER_NAME = "root";
$PASS = "tiger";
$DATA_BASE = "my_project";
$PORT = "3306";
$SOCKET = "";

$mysqli = new mysqli($HOST_NAME, $USER_NAME, $PASS, $DATA_BASE, $PORT, $SOCKET) or die ("Couldn't connect");

if($mysqli->connect_errno) {
    echo "connected false " . $mysqli->connect_error;
    exit();
}
