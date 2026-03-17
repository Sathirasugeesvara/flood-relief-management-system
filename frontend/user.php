<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}

$full_name = $_SESSION['full_name'];
$user_id = $_SESSION['user_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "floodrelfmansys_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, relief_type, district, severity, created_at 
        FROM requests 
        WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$requests_result = mysqli_stmt_get_result($stmt);

$requests = $requests_result ? $requests_result : [];
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Page</title>
  <link rel="stylesheet" href="css/styles.css">
  <style>
    .action-btn {
      padding: 6px 12px;
      margin: 2px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      font-size: 14px;
      color: white;
    }
    .edit-btn { background-color: #2563EB; }
    .edit-btn:hover { background-color: #1D4ED8; }
    .delete-btn { background-color: #DC2626; }
    .delete-btn:hover { background-color: #a71f1f; }
  </style>
</head>
<body>

<header>
  <h1>Welcome, <?php echo htmlspecialchars($full_name); ?></h1>
  <nav>
    <a href="request.html">Create Request</a>
    <a href="../backend/logout.php">Logout</a>
  </nav>
</header>

<div class="card">
  <h2>My Relief Requests</h2>

  <table class="user-requests-table">
      <tr>
        <th>Relief Type</th>
        <th>District</th>
        <th>Severity</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>

      <?php if(mysqli_num_rows($requests) > 0): ?>
          <?php while($r = mysqli_fetch_assoc($requests)) { ?>
          <tr>
            <td><?php echo htmlspecialchars($r['relief_type']); ?></td>
            <td><?php echo htmlspecialchars($r['district']); ?></td>
            <td><?php echo htmlspecialchars($r['severity']); ?></td>
            <td><?php echo htmlspecialchars($r['created_at']); ?></td>
            <td>
              <button class="action-btn edit-btn" onclick="window.location.href='edit_request.php?id=<?php echo $r['id']; ?>'">
                Edit
              </button>
              <button class="action-btn delete-btn" onclick="if(confirm('Delete this request?')) window.location.href='../backend/delete_request.php?id=<?php echo $r['id']; ?>'">
                Delete
              </button>
            </td>
          </tr>
          <?php } ?>
      <?php else: ?>
          <tr>
            <td colspan="5">No requests found.</td>
          </tr>
      <?php endif; ?>

  </table>
</div>

<script src="js/script.js"></script>
</body>
</html>