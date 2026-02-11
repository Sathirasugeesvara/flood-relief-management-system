<?php


$host = "localhost";
$username = "root";
$password = "";
$database = "floodRelfManSys_db";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Database connection failed");
}

?>
