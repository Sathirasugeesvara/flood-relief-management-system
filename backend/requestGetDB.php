<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['user_id'];

    $reliefType = $_POST['reliefType'];
    $district = $_POST['district'];
    $divsecre = $_POST['divsecre'];
    $gndevision = $_POST['gndevision'];
    $conname = $_POST['conname'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $numofmembers = $_POST['numofmembers'];
    $severity = $_POST['severity'];
    $description = $_POST['description'];

    $sql = "INSERT INTO requests
    (user_id, relief_type, district, divisional_secretariat, gn_division, contact_name, contact_number, address, family_members, severity, description)
    VALUES
    ('$user_id','$reliefType','$district','$divsecre','$gndevision','$conname','$number','$address','$numofmembers','$severity','$description')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>
        alert("Request submitted successfully!");
        window.location.href="../frontend/user.php";
        </script>';
    } else {
        echo '<script>
        alert("Error submitting request");
        window.location.href="../frontend/user.php";
        </script>';
    }

    $conn->close();
}
?>