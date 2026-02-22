<?php
session_start();
include("../backend/db.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$full_name = $_SESSION['full_name'];

// logout wenn user gen riq ek gnn
$sql = "SELECT * FROM requests WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Page</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
  <h1>Welcome, <?php echo $full_name; ?></h1>
  <nav>
    <a href="request.html">Create Request</a>
    <a href="../backend/logout.php">Logout</a>
  </nav>
</header>

<div class="card">
  <h2>My Relief Requests</h2>

  <table border="1" width="100%" cellpadding="8">
    <tr>
      <th>Type</th>
      <th>District</th>
      <th>Severity</th>
      <th>Actions</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['relief_type'] . "</td>";
        echo "<td>" . $row['district'] . "</td>";
        echo "<td>" . $row['severity'] . "</td>";
        echo "<td>
                <a href='edit_request.php?id=" . $row['id'] . "'>Edit</a> |
                <a href='../backend/delete_request.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure?')\">Delete</a>
              </td>";
        echo "</tr>";
    }
    ?>
  </table>
</div>

<footer>
  <br>
  © 2026 Flood Relief Management System – Sri Lanka
  <br><br>
</footer>

</body>
</html>
