<?php
session_start();
include("db.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users 
        WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $row['id'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['full_name'] = $row['full_name'];

    if ($row['role'] == 'admin') {
        header("Location: ../frontend/admin.php");
    } else {
        header("Location: ../frontend/user.php");
    }

} else {
    echo "<script>
            alert('Invalid email or password');
            window.location.href='../frontend/login.php';
          </script>";
}
?>
