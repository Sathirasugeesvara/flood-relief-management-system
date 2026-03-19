<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  
  <div class="card" style="max-width:480px;margin:40px auto;">
    <h2 style="text-align:center;">User Registration</h2>
    <p style="text-align:center;color:#6B7280;">
      Create an account to request flood relief
    </p>

    <form action="../backend/register_process.php" method="POST">

      <label>Full Name</label>
      <input name="full_name" type="text" placeholder="Enter full name" 
        style="width:100%;padding:10px;margin:8px 0 14px;border-radius:6px;border:1px solid #D1D5DB;" required />

      <label>Email</label>
      <input name="email" type="email" placeholder="Enter email address"
        style="width:100%;padding:10px;margin:8px 0 14px;border-radius:6px;border:1px solid #D1D5DB;" required />

      <label>Password</label>
      <input name="password" type="password" placeholder="Create password"
        style="width:100%;padding:10px;margin:8px 0 14px;border-radius:6px;border:1px solid #D1D5DB;" required />

      <button type="submit" class="btn btn-primary" style="width:100%;">Register</button>
    </form>

    <p style="text-align:center;margin-top:16px;">
      Already have an account? 
      <a href="login.php" style="color:#0D9488;font-weight:bold;">Login</a>
    </p>
  </div>
<br><br><br><br><br><br><br><br><br><br>
  <footer>
    <br>
    © 2026 Flood Relief Management System – Sri Lanka
    <br><br>
  </footer>

  <script src="js/script.js"></script>
</body>
</html>
