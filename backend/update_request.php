<?php
include("db.php");

//to capture input data
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
$description = $_POST['description']; 

//update query
$sql = "UPDATE requests SET
    relief_type='$reliefType',
    district='$district',
    divisional_secretariat='$divsecre',
    gn_division='$gndevision',
    contact_name='$conname',
    contact_number='$number',
    address='$address',
    family_members='$numofmembers',
    severity='$severity',
    description='$description'
WHERE id='$id'";   //for identifying the specific request to update

if(mysqli_query($conn, $sql)){
    echo "<script>
        alert('✅ Request updated successfully.');
        window.location.href='../frontend/user.php';
    </script>";
} else {
    echo "<script>
        alert('❎ Error updating request.');
        window.location.href='../frontend/user.php';
    </script>";
}
?>