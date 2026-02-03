<?php
session_start();
include("../config/db.php");

$result = $conn->query("SELECT * FROM guides");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tour Guides - Beyond Boundaries</title>
</head>
<body>

<h2>👨‍✈️ Available Tour Guides</h2>
<a href="../dashboard.php">⬅ Back to Dashboard</a>
<hr>

<?php while($g = $result->fetch_assoc()): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <h3><?php echo $g['name']; ?></h3>
        <p><b>Experience:</b> <?php echo $g['experience']; ?> years</p>
        <p><b>Languages:</b> <?php echo $g['languages']; ?></p>
        <p><b>Rating:</b> ⭐ <?php echo $g['rating']; ?></p>
        <p><b>Price per day:</b> $<?php echo $g['price_per_day']; ?></p>

        <a href="guide_details.php?id=<?php echo $g['guide_id']; ?>">View Profile</a>
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
