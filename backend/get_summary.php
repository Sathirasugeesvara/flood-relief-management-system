<?php
include("db.php");

$area = $_GET['area'];
$type = $_GET['type'];

$where = "WHERE 1=1";

if($area != "")
    $where .= " AND district='$area'";

if($type != "")
    $where .= " AND relief_type='$type'";

$total_users = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS t FROM users"))['t'];
$high_severity = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS t FROM requests $where AND severity='High'"))['t'];
$food = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS t FROM requests $where AND relief_type='Food'"))['t'];
$medicine = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS t FROM requests $where AND relief_type='Medicine'"))['t'];

echo json_encode([
    "total_users" => $total_users,
    "high_severity" => $high_severity,
    "food_requests" => $food,
    "medicine_requests" => $medicine
]);
?>