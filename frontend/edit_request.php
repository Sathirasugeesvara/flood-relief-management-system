<?php
session_start();
include("../backend/db.php");

if (!isset($_GET['id'])) {
    header("Location: user.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM requests WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "Request not found";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Request</title>
  <link rel="stylesheet" type="text/css" href="css/stylesEdit.css">
  
</head>
<body>

<div class="edit-container">
  <h2>Edit Relief Request</h2>

  <form action="../backend/update_request.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>Type of Relief</label>
    <select name="reliefType">
      <option value="Food" <?php if($row['relief_type']=="Food") echo "selected"; ?>>Food</option>
      <option value="Water" <?php if($row['relief_type']=="Water") echo "selected"; ?>>Water</option>
      <option value="Medicine" <?php if($row['relief_type']=="Medicine") echo "selected"; ?>>Medicine</option>
      <option value="Shelter" <?php if($row['relief_type']=="Shelter") echo "selected"; ?>>Shelter</option>
    </select>

    <label>District</label>
    <input type="text" name="district" value="<?php echo $row['district']; ?>">

    <label>Divisional Secretariat</label>
    <input type="text" name="divsecre" value="<?php echo $row['divisional_secretariat']; ?>">

    <label>GN Division</label>
    <input type="text" name="gndevision" value="<?php echo $row['gn_division']; ?>">

    <label>Contact Name</label>
    <input type="text" name="conname" value="<?php echo $row['contact_name']; ?>">

    <label>Contact Number</label>
    <input type="text" name="number" value="<?php echo $row['contact_number']; ?>">

    <label>Address</label>
    <textarea name="address"><?php echo $row['address']; ?></textarea>

    <label>Number of Family Members</label>
    <input type="number" name="numofmembers" value="<?php echo $row['family_members']; ?>">

    <label>Severity</label>
    <select name="severity">
      <option value="Low" <?php if($row['severity']=="Low") echo "selected"; ?>>Low</option>
      <option value="Medium" <?php if($row['severity']=="Medium") echo "selected"; ?>>Medium</option>
      <option value="High" <?php if($row['severity']=="High") echo "selected"; ?>>High</option>
    </select>

    <button type="submit">Update Request</button>
  </form>

  <a href="user.php" class="back-link">
    <i class="fas fa-arrow-left"></i> Back to My Requests
  </a>

</div>

</body>
</html>