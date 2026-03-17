<!--to generate report for user entered distric and relief type-->
<?php
session_start();
include("../backend/db.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$district = $_GET['district'] ?? '';
$type = $_GET['type'] ?? '';

$query = "SELECT r.*, u.full_name
          FROM requests r
          JOIN users u ON r.user_id = u.id
          WHERE 1=1";

if($district != ""){
    $query .= " AND r.district='$district'";
}

if($type != ""){
    $query .= " AND r.relief_type='$type'";
}

$query .= " ORDER BY r.created_at DESC";

$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>

<title>Relief Requests Report</title>

<link rel="stylesheet" href="css/report.css">

</head>

<body>

<header>

<h1>Relief Requests Report</h1>

<button onclick="window.location.href='admin.php'" class="btnrepo">
← Back to Dashboard
</button>

</header>


<div class="container">

<table>

<thead>

<tr>
<th>ID</th>
<th>User</th>
<th>District</th>
<th>Relief Type</th>
<th>Family Members</th>
<th>Severity</th>
<th>Date</th>
</tr>

</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['district']; ?></td>

<td><?php echo $row['relief_type']; ?></td>

<td><?php echo $row['family_members']; ?></td>

<td><?php echo $row['severity']; ?></td>

<td><?php echo $row['created_at']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>
</html>