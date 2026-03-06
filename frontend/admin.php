<?php
  include("../backend/admin_dashboard.php");
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
        <option value="Ampara">Ampara</option>
          <option value="Anuradhapura">Anuradhapura</option>
          <option value="Badulla">Badulla</option>
          <option value="Batticaloa">Batticaloa</option>
          <option value="Colombo">Colombo</option>
          <option value="Galle">Galle</option>
          <option value="Gampaha">Gampaha</option>
          <option value="Hambantota">Hambantota</option>
          <option value="Jaffna">Jaffna</option>
          <option value="Kalutara">Kalutara</option>
          <option value="Kandy">Kandy</option>
          <option value="Kegalle">Kegalle</option>
          <option value="Kilinochchi">Kilinochchi</option>
          <option value="Kurunegala">Kurunegala</option>
          <option value="Mannar">Mannar</option>
          <option value="Matale">Matale</option>
          <option value="Matara">Matara</option>
          <option value="Monaragala">Monaragala</option>
          <option value="Mullaitivu">Mullaitivu</option>
          <option value="Nuwara Eliya">Nuwara Eliya</option>
          <option value="Polonnaruwa">Polonnaruwa</option>
          <option value="Puttalam">Puttalam</option>
          <option value="Ratnapura">Ratnapura</option>
          <option value="Trincomalee">Trincomalee</option>
          <option value="Vavuniya">Vavuniya</option>
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

<script src="js/admin.js"></script>

</body>
</html>