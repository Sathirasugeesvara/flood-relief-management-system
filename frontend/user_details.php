<?php
session_start();
include("../backend/db.php");

/* ===============================
   SECURITY CHECK
================================= */

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit();
}

$id = (int) $_GET['id'];



$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$user = mysqli_fetch_assoc($user_query);

if (!$user) {
    echo "User not found.";
    exit();
}

$requests = mysqli_query($conn, "SELECT * FROM requests WHERE user_id=$id");
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Summary Report</title>

  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/user_details.css">
</head>

<body>

<header>
  <h1>User Summary Report</h1>
  <nav>
    <a href="admin.php">Back to Dashboard</a>
    <a href="../backend/logout.php">Logout</a>
  </nav>
</header>

<div class="user-details-container">

  <div class="user-details-card">

    <div class="user-details-title">
      <?php echo $user['full_name']; ?> - Profile
    </div>

    <div class="user-info-grid">

      <div class="info-box">
        <div class="info-label">Full Name</div>
        <div class="info-value"><?php echo $user['full_name']; ?></div>
      </div>

      <div class="info-box">
        <div class="info-label">Email</div>
        <div class="info-value"><?php echo $user['email']; ?></div>
      </div>

      <div class="info-box">
        <div class="info-label">Role</div>
        <div class="info-value"><?php echo ucfirst($user['role']); ?></div>
      </div>

      <div class="info-box">
        <div class="info-label">Account Created</div>
        <div class="info-value"><?php echo $user['created_at']; ?></div>
      </div>

    </div>

    <div class="requests-title">Relief Requests</div>

    <table class="user-requests-table">
      <tr>
        <th>Relief Type</th>
        <th>District</th>
        <th>Severity</th>
        <th>Date</th>
      </tr>

      <?php while($r = mysqli_fetch_assoc($requests)) { ?>
      <tr>
        <td><?php echo $r['relief_type']; ?></td>
        <td><?php echo $r['district']; ?></td>
        <td><?php echo $r['severity']; ?></td>
        <td><?php echo $r['created_at']; ?></td>
      </tr>
      <?php } ?>

    </table>

    <a href="admin.php" class="back-btn">← Back to Dashboard</a>

  </div>

</div>

</body>
</html>