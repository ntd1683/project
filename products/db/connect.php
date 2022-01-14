<?php

const HOST_NAME = "localhost";
const USER_NAME = "root";
const PASS = "tiger";
const DATA_BASE = "my_project";
const PORT = "3306";
const SOCKET = "";

$mysqli = new mysqli(HOST_NAME, USER_NAME, PASS, DATA_BASE, PORT, SOCKET) or die ("Couldn't connect");

if($mysqli->connect_errno) {
    echo "connected false " . $mysqli->connect_error;
    exit();
}
