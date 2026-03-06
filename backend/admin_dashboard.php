<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

$total_users = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS t FROM users")
)['t'];

$high_severity = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS t FROM requests WHERE severity='High'")
)['t'];

$food_requests = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS t FROM requests WHERE relief_type='Food'")
)['t'];

$medicine_requests = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS t FROM requests WHERE relief_type='Medicine'")
)['t'];

$users = mysqli_query($conn,"SELECT * FROM users ORDER BY created_at DESC");


?>