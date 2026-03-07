<?php
session_start();
include("db.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../frontend/login.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM users WHERE id='$id'");


exit();
?>
