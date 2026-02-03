<?php
session_start();
include("../config/db.php");

$result = $conn->query("SELECT * FROM restaurants");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restaurants - Beyond Boundaries</title>
</head>
<body>

<h2>🍽 Restaurants</h2>
<a href="../dashboard.php">⬅ Back to Dashboard</a>
<hr>

<?php while($res = $result->fetch_assoc()): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <h3><?php echo $res['name']; ?></h3>
        <p><b>Location:</b> <?php echo $res['location']; ?></p>
        <p><b>Rating:</b> ⭐ <?php echo $res['rating']; ?></p>
        <a href="restaurant_details.php?id=<?php echo $res['restaurant_id']; ?>">View Menu</a>
    </div>
<?php endwhile; ?>



</body>
</html>
