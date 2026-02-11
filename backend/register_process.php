<?php
include("db.php");

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users (full_name, email, password) 
        VALUES ('$full_name', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Registration successful!');
            window.location.href='../frontend/login.php';
          </script>";
} else {
    echo "<script>
            alert('Error: Email may already exist!');
            window.location.href='../frontend/register.php';
          </script>";
}
?>
