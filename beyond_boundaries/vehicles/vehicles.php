<?php
session_start();
include("../config/db.php");

$result = $conn->query("SELECT * FROM vehicles");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vehicles - Beyond Boundaries</title>
</head>
<body>

<h2>🚗 Available Vehicles</h2>
<a href="../dashboard.php">⬅ Back to Dashboard</a>
<hr>

<?php while($vehicle = $result->fetch_assoc()): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <h3><?php echo ucfirst($vehicle['type']); ?> - <?php echo $vehicle['model']; ?></h3>
        <p><b>Price per Day:</b> $<?php echo $vehicle['price_per_day']; ?></p>
        <a href="vehicle_details.php?id=<?php echo $vehicle['vehicle_id']; ?>">View Details</a>
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
