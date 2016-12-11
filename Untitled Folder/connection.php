<?php
$username = "root";
$password = "";
$host = "127.0.0.1";
$db = "superdash";

$connection = mysqli_connect($host, $username, $password, $db);
if (mysqli_connect_error()) {

    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>