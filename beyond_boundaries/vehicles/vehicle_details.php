<?php
session_start();
include("../config/db.php");

$id = $_GET['id'];

$vehicle = $conn->query("SELECT * FROM vehicles WHERE vehicle_id=$id")->fetch_assoc();
$drivers = $conn->query("SELECT * FROM drivers");
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $vehicle['model']; ?></title>
</head>
<body>

<a href="vehicles.php">⬅ Back</a>

<h2><?php echo ucfirst($vehicle['type']); ?> - <?php echo $vehicle['model']; ?></h2>
<p><b>Price per Day:</b> $<?php echo $vehicle['price_per_day']; ?></p>

<h3>👨‍✈ Available Drivers</h3>

<form method="POST" action="book_vehicle.php">
    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicle_id']; ?>">

    <label>Select Driver:</label>
    <select name="driver_id">
        <?php while($driver = $drivers->fetch_assoc()): ?>
            <option value="<?php echo $driver['driver_id']; ?>">
                <?php echo $driver['name']; ?> (<?php echo $driver['experience']; ?> yrs exp, ⭐ <?php echo $driver['rating']; ?>)
            </option>
        <?php endwhile; ?>
    </select>
    <br><br>

    From: <input type="date" name="start_date" required>
    To: <input type="date" name="end_date" required>
    <br><br>

    <button type="submit">Book Vehicle</button>
</form>
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
