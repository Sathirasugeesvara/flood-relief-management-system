<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login page</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container">
  <div class="card" style="max-width:420px;margin:40px auto;">
    <h2 style="text-align:center;">System Login</h2>
    <p style="text-align:center;color:#6B7280;">
      Flood Relief Management System
    </p>

    <form action="../backend/login_process.php" method="POST">

      <label>Email</label>
      <input name="email" type="email" required
        style="width:100%;padding:10px;margin:8px 0 16px;border-radius:6px;border:1px solid #D1D5DB;" />

      <label>Password</label>
      <input name="password" type="password" required
        style="width:100%;padding:10px;margin:8px 0 16px;border-radius:6px;border:1px solid #D1D5DB;" />

      <button type="submit" class="btn btn-primary" style="width:100%;">Login</button>
    </form>

    <p style="text-align:center;margin-top:16px;">
      Don’t have an account? 
      <a href="register.php" style="color:#0D9488;font-weight:bold;">Register</a>
    </p>
  </div>
<br><br><br><br><br><br><br><br><br><br><br><br>
  <footer>
    <br>
    © 2026 Flood Relief Management System – Sri Lanka
    <br><br>
  </footer>
</div>

<script src="js/script.js"></script>
</body>
</html>
