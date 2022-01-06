<?php

require_once "../url.php";
require_once ROOT_PATH . "products/db/connect.php";

echo $_POST["user_name"] . "<br>";
echo $_POST["password"] . "<br>";
if(isset($_POST['checkbox'])) {
    echo $_POST["checkbox"] . "<br>";
}

$query = "SELECT * FROM `customers`";

mysqli_query($mysqli, "user_name_query");