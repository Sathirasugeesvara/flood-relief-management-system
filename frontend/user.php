<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}

$full_name = $_SESSION['full_name'];
?>

<!DOCTYPE html>
<html>
<head>
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
    <thead>
      <tr>
        <th>Type</th>
        <th>District</th>
        <th>Severity</th>
        <th>Changes</th>
      </tr>
    </thead>
    <tbody id="requestTable">
    </tbody>
  </table>
</div>

<script src="js/script.js"></script>

</body>
</html>