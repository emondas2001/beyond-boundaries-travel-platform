<?php
session_start();
include("../config/db.php");

$result = $conn->query("SELECT * FROM hospitals");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hospitals - Beyond Boundaries</title>
</head>
<body>

<h2>🏥 Nearby Hospitals</h2>
<a href="../dashboard.php">⬅ Back to Dashboard</a>
<hr>

<?php while($row = $result->fetch_assoc()): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <h3><?php echo $row['name']; ?></h3>
        <p><b>Location:</b> <?php echo $row['location']; ?></p>
        <p><b>Ambulance:</b> 📞 <?php echo $row['ambulance_phone']; ?></p>
        <a href="hospital_details.php?id=<?php echo $row['hospital_id']; ?>">View Doctors</a>
    </div>
<?php endwhile; ?>

<link rel="stylesheet" href="../assets/css/style.css">
<script src="../assets/js/main.js" defer></script>

<div class="navbar">
    <h1>Beyond Boundaries</h1>
    <div>
        <a href="../dashboard.php">Dashboard</a>
        <a href="../auth/logout.php">Logout</a>
    </div>
</div>

<div class="container">

</body>
</html>
