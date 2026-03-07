<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: ../frontend/login.php");
    exit();
}

$id = intval($_GET['id']); // sanitize input
$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM requests WHERE id=? AND user_id=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $id, $user_id);
mysqli_stmt_execute($stmt);

header("Location: ../frontend/user.php");
exit();
?>