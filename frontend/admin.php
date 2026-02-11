<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

  <header>
    <h1>Flood Relief Management</h1>
    <nav>
      <a href="request.html">Requests</a>
      <a href="login.html" id="adminLogoutBtn">Logout</a>
    </nav>
  </header>

    <div class="container">
    <div class="card">
      <h2>Admin Dashboard Overview</h2>
      <p>Quick summary of the system status</p>
      <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;">
        <div class="card" style="background:#EFF6FF;">
          <h3>Total Users</h3>
          <p style="font-size:28px;font-weight:bold;">0</p>
        </div>
        <div class="card" style="background:#FEF3C7;">
          <h3>High Severity</h3>
          <p style="font-size:28px;font-weight:bold;">0</p>
        </div>
        <div class="card" style="background:#DCFCE7;">
          <h3>Food Requests</h3>
          <p style="font-size:28px;font-weight:bold;">0</p>
        </div>
        <div class="card" style="background:#FEE2E2;">
          <h3>Medicine Requests</h3>
          <p style="font-size:28px;font-weight:bold;">0</p>
        </div>
      </div>
    </div>

    <div class="card">
      <h2>Registered Users</h2>
      <table>
        <tr>
          <th>Name</th>
          <th>Role</th>
          <th>District</th>
          <th>Actions</th>
        </tr>
        <tr>
          <td>Nimal Perera</td>
          <td>User</td>
          <td>Colombo</td>
          <td>
            <button class="btn btn-primary view-user">View</button>
            <button class="btn btn-danger delete-user">Delete</button>
          </td>
        </tr>
      </table>
    </div>

    <footer>
        <br>
    © 2026 Flood Relief Management System – Sri Lanka
    <br><br>
  </footer>

<script src="js/script.js"></script>
</body>
</html>