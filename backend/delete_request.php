<?php
session_start();
include("db.php");

//if user is not logged in or not a regular user, redirect to login page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: ../frontend/login.php");
    exit();
}

$id = intval($_GET['id']);
$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM requests WHERE id=? AND user_id=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $id, $user_id);

if(mysqli_stmt_execute($stmt)){
    echo "<script>
        alert('✅ Request deleted successfully.');
        window.location.href='../frontend/user.php';
    </script>";
} else {
    echo "<script>
        alert('❎ Error deleting request.');
        window.location.href='../frontend/user.php';
    </script>";
}

?>