<?php
include("db.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id='$id'";
    if(mysqli_query($conn,$sql)){
    
        echo '<script>
            alert("✅User deleted successfully.");
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