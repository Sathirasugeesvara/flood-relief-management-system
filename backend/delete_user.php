<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../frontend/login.php");
    exit();
}

if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM users WHERE id='$id' AND role!='admin'";

    if(mysqli_query($conn,$sql)){
    
        echo '<script>
            alert("✅ User deleted successfully.");
            window.location.href="../frontend/admin.php";
        </script>';
        exit();

    } else {
  
        echo '<script>
            alert("❎ Error deleting user.");
            window.location.href="../frontend/admin.php";
        </script>';
        exit();
    }
}

header("Location: ../frontend/admin.php");
exit();
?>