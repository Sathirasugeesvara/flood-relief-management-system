<?php
session_start();
include("../backend/db.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}

$id = intval($_GET['id']);
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM requests WHERE id=? AND user_id=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $id, $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$request = mysqli_fetch_assoc($result);

if (!$request) {
    echo "Request not found or access denied.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Relief Request</title>
<link rel="stylesheet" href="css/styles.css">
</head>

<body>

<div class="card" style="max-width:700px;margin:40px auto;">
<h2>Edit Relief Request</h2>
<p style="color:#6B7280;">Update the details of your flood relief request below</p>

<form action="../backend/update_request.php" method="POST">

<input type="hidden" name="id" value="<?php echo $request['id']; ?>">

<label>Type of Relief</label>
<select name="reliefType" style="width:100%;padding:10px;margin:8px 0 14px;border-radius:6px;border:1px solid #D1D5DB;">
<option value="Food" <?php if($request['relief_type']=="Food") echo "selected"; ?>>Food</option>
<option value="Water" <?php if($request['relief_type']=="Water") echo "selected"; ?>>Water</option>
<option value="Medicine" <?php if($request['relief_type']=="Medicine") echo "selected"; ?>>Medicine</option>
<option value="Shelter" <?php if($request['relief_type']=="Shelter") echo "selected"; ?>>Shelter</option>
</select>

<label>District</label>
<select name="district" style="width:100%;padding:10px;margin:8px 0 14px;border-radius:6px;border:1px solid #D1D5DB;">
<?php
$districts = ["Ampara","Anuradhapura","Badulla","Batticaloa","Colombo","Galle","Gampaha","Hambantota","Jaffna","Kalutara","Kandy","Kegalle","Kilinochchi","Kurunegala","Mannar","Matale","Matara","Monaragala","Mullaitivu","Nuwara Eliya","Polonnaruwa","Puttalam","Ratnapura","Trincomalee","Vavuniya"];
foreach($districts as $district){
$selected = ($request['district'] == $district) ? "selected" : "";
echo "<option value='$district' $selected>$district</option>";
}
?>
</select>

<label>Divisional Secretariat</label>
<input type="text" name="divsecre"
value="<?php echo htmlspecialchars($request['divisional_secretariat']); ?>"
style="width:100%;padding:10px;margin:8px 0 14px;border-radius:6px;border:1px solid #D1D5DB;" required>

<label>GN Division</label>
<input type="text" name="gndevision"
value="<?php echo htmlspecialchars($request['gn_division']); ?>"
style="width:100%;padding:10px;margin:8px 0 14px;border-radius:6px;border:1px solid #D1D5DB;" required>

<label>Contact Person Name</label>
<input type="text" name="conname"
value="<?php echo htmlspecialchars($request['contact_name']); ?>"
style="width:100%;padding:10px;margin:8px 0 14px;border-radius:6px;border:1px solid #D1D5DB;" required>

<label>Contact Number</label>
<input type="text" name="number"
value="<?php echo htmlspecialchars($request['contact_number']); ?>"
style="width:100%;padding:10px;margin:8px 0 14px;border-radius:6px;border:1px solid #D1D5DB;" required>

<label>Address</label>
<textarea name="address"
style="width:100%;padding:10px;margin:8px 0 14px;border-radius:6px;border:1px solid #D1D5DB;" required><?php echo htmlspecialchars($request['address']); ?></textarea>

<label>Number of Family Members</label>
<input type="number" name="numofmembers"
value="<?php echo $request['family_members']; ?>"
style="width:100%;padding:10px;margin:8px 0 14px;border-radius:6px;border:1px solid #D1D5DB;" required>

<label>Flood Severity Level</label>
<select name="severity"
style="width:100%;padding:10px;margin:8px 0 14px;border-radius:6px;border:1px solid #D1D5DB;">
<option value="Low" <?php if($request['severity']=="Low") echo "selected"; ?>>Low</option>
<option value="Medium" <?php if($request['severity']=="Medium") echo "selected"; ?>>Medium</option>
<option value="High" <?php if($request['severity']=="High") echo "selected"; ?>>High</option>
</select>

<label>Description / Special Requirements</label>
<textarea name="description"
style="width:100%;padding:10px;margin:8px 0 20px;border-radius:6px;border:1px solid #D1D5DB;"><?php echo htmlspecialchars($request['description']); ?></textarea>

<button type="submit" class="btn btn-primary" style="width:100%;">Update Request</button>

</form>

<button onclick="window.location.href='user.php'"
class="btn btn-primary"
style="width:100%;margin-top:15px;background-color:#2563EB;">
← Back to My Requests
</button>

</div>

<footer style="text-align:center;margin-top:40px;font-size:14px;">
© 2026 Flood Relief Management System – Sri Lanka
</footer>

<script src="js/script.js"></script>

</body>
</html>