<?php
include("db.php");

$id = $_POST['id'];
$reliefType = $_POST['reliefType'];
$district = $_POST['district'];
$divsecre = $_POST['divsecre'];
$gndevision = $_POST['gndevision'];
$conname = $_POST['conname'];
$number = $_POST['number'];
$address = $_POST['address'];
$numofmembers = $_POST['numofmembers'];
$severity = $_POST['severity'];

$sql = "UPDATE requests SET
    relief_type='$reliefType',
    district='$district',
    divisional_secretariat='$divsecre',
    gn_division='$gndevision',
    contact_name='$conname',
    contact_number='$number',
    address='$address',
    family_members='$numofmembers',
    severity='$severity'
WHERE id='$id'";

mysqli_query($conn, $sql);

header("Location: ../frontend/user.php");
exit();
?>