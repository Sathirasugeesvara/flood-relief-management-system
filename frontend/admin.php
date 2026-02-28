<?php
session_start();
include("../backend/db.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

/* ===============================
   DASHBOARD COUNTS
================================= */

$total_users = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS t FROM users")
)['t'];

$high_severity = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS t FROM requests WHERE severity='High'")
)['t'];

$food_requests = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS t FROM requests WHERE relief_type='Food'")
)['t'];

$medicine_requests = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) AS t FROM requests WHERE relief_type='Medicine'")
)['t'];

$users = mysqli_query($conn,"SELECT * FROM users ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>

  <!-- Main Styles -->
  <link rel="stylesheet" href="css/styles.css">

  <!-- Admin Specific Styles -->
  <link rel="stylesheet" href="css/admin.css">
</head>

<body>

<header>
  <h1>Admin Dashboard</h1>
  <nav>
    <a href="../backend/logout.php">Logout</a>
  </nav>
</header>

<div class="admin-container">

  <!-- ===============================
       SYSTEM OVERVIEW
  ================================= -->

  <h2 class="admin-title">System Overview</h2>

  <div class="overview-grid">

    <div class="overview-card">
      <h3>Total Users</h3>
      <div class="overview-number"><?php echo $total_users; ?></div>
    </div>

    <div class="overview-card">
      <h3>High Severity Requests</h3>
      <div class="overview-number"><?php echo $high_severity; ?></div>
    </div>

    <div class="overview-card">
      <h3>Food Requests</h3>
      <div class="overview-number"><?php echo $food_requests; ?></div>
    </div>

    <div class="overview-card">
      <h3>Medicine Requests</h3>
      <div class="overview-number"><?php echo $medicine_requests; ?></div>
    </div>

  </div>


  <!-- ===============================
       FILTERED REPORT SECTION
  ================================= -->

  <div class="card">
    <h2>Generate Filtered Report</h2>

    <div class="filter-section">
      <select id="area">
        <option value="">Select Area</option>
        <option value="Kalutara">Kalutara</option>
        <option value="Colombo">Colombo</option>
      </select>

      <select id="type">
        <option value="">Select Relief Type</option>
        <option value="Food">Food</option>
        <option value="Water">Water</option>
        <option value="Medicine">Medicine</option>
        <option value="Shelter">Shelter</option>
      </select>

      <button class="btnrepo" onclick="generateReport()">Generate Report</button>
    </div>

    <div id="reportResult"></div>
  </div>


  <!-- ===============================
       REGISTERED USERS TABLE
  ================================= -->

  <div class="card">
    <h2>Registered Users</h2>

    <table class="admin-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
      <?php while($u = mysqli_fetch_assoc($users)) { ?>
        <tr>
          <td><?php echo $u['full_name']; ?></td>
          <td><?php echo $u['email']; ?></td>
          <td>
            <span class="status <?php echo $u['role']=='admin'?'medium':'low'; ?>">
              <?php echo ucfirst($u['role']); ?>
            </span>
          </td>
          <td>
            <button class="action-btn view-btn"
              onclick="window.location.href='user_details.php?id=<?php echo $u['id']; ?>'">
              View
            </button>

            <button class="action-btn delete-btn"
              onclick="if(confirm('Delete this user?')) window.location.href='../backend/delete_user.php?id=<?php echo $u['id']; ?>'">
              Delete
            </button>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>

</div>

<footer>
  © 2026 Flood Relief Management System – Sri Lanka
</footer>

<!-- Admin JS -->
<script src="js/admin.js"></script>

</body>
</html>