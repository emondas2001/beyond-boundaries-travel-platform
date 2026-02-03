<?php
session_start();
include("../config/db.php");

$id = $_GET['id'];
$guide = $conn->query("SELECT * FROM guides WHERE guide_id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $guide['name']; ?></title>
</head>
<body>

<a href="guides.php">⬅ Back</a>

<h2><?php echo $guide['name']; ?></h2>
<p><b>Experience:</b> <?php echo $guide['experience']; ?> years</p>
<p><b>Languages:</b> <?php echo $guide['languages']; ?></p>
<p><b>Rating:</b> ⭐ <?php echo $guide['rating']; ?></p>
<p><b>Price per day:</b> $<?php echo $guide['price_per_day']; ?></p>

<h3>Hire this Guide</h3>
<form method="POST" action="hire_guide.php">
    <input type="hidden" name="guide_id" value="<?php echo $guide['guide_id']; ?>">
    Date: <input type="date" name="date" required>
    <button type="submit">Hire Guide</button>
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
