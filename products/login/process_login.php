<?php

require_once "../url.php";
require_once ROOT_PATH . "products/db/connect.php";

echo $_POST["user_name"] . "<br>";
echo $_POST["password"] . "<br>";
if(isset($_POST['checkbox'])) {
    echo $_POST["checkbox"] . "<br>";
}

$query = "SELECT * FROM `customers`";

$result = mysqli_query($mysqli, $query);
if (!$result){
    die("false to query");
}
