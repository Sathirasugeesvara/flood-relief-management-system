<?php
session_start();
include("../backend/db.php");

// Protect page (Admin only)
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

/* ===== Dashboard Counts ===== */

// Total users
$total_users_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users");
$total_users = mysqli_fetch_assoc($total_users_query)['total'];

// High severity requests
$high_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM requests WHERE severity='High'");
$high_severity = mysqli_fetch_assoc($high_query)['total'];

// Food requests
$food_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM requests WHERE relief_type='Food'");
$food_requests = mysqli_fetch_assoc($food_query)['total'];

// Medicine requests
$medicine_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM requests WHERE relief_type='Medicine'");
$medicine_requests = mysqli_fetch_assoc($medicine_query)['total'];

// Get all users
$users_result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
  <h1>Admin Dashboard</h1>
  <nav>
    <a href="../backend/logout.php">Logout</a>
  </nav>
</header>

<div class="container">

  <!-- Dashboard Overview -->
  <div class="card">
    <h2>System Overview</h2>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;">

      <div class="card" style="background:#EFF6FF;">
        <h3>Total Users</h3>
        <p style="font-size:28px;font-weight:bold;">
          <?php echo $total_users; ?>
        </p>
      </div>

      <div class="card" style="background:#FEF3C7;">
        <h3>High Severity</h3>
        <p style="font-size:28px;font-weight:bold;">
          <?php echo $high_severity; ?>
        </p>
      </div>

      <div class="card" style="background:#DCFCE7;">
        <h3>Food Requests</h3>
        <p style="font-size:28px;font-weight:bold;">
          <?php echo $food_requests; ?>
        </p>
      </div>

      <div class="card" style="background:#FEE2E2;">
        <h3>Medicine Requests</h3>
        <p style="font-size:28px;font-weight:bold;">
          <?php echo $medicine_requests; ?>
        </p>
      </div>

    </div>
  </div>

  <!-- Registered Users Table -->
  <div class="card">
    <h2>Registered Users</h2>

    <table border="1" width="100%" cellpadding="8">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>

      <?php
      while ($user = mysqli_fetch_assoc($users_result)) {
          echo "<tr>";
          echo "<td>" . $user['full_name'] . "</td>";
          echo "<td>" . $user['email'] . "</td>";
          echo "<td>" . $user['role'] . "</td>";
          echo "<td>
                  <a href='../backend/delete_user.php?id=" . $user['id'] . "' 
                     onclick=\"return confirm('Are you sure you want to delete this user?')\">
                     Delete
                  </a>
                </td>";
          echo "</tr>";
      }
      ?>

    </table>
  </div>

</div>

<footer>
  <br>
  © 2026 Flood Relief Management System – Sri Lanka
  <br><br>
</footer>

</body>
</html>
