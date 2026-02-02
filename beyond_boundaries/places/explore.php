<?php
session_start();
include("../config/db.php");

$result = $conn->query("SELECT * FROM places");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Explore Places - Beyond Boundaries</title>
</head>
<body>

<h2>🌍 Explore Tourist Places</h2>
<a href="../dashboard.php">⬅ Back to Dashboard</a>
<hr>

<?php while($row = $result->fetch_assoc()): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <h3><?php echo $row['name']; ?></h3>
        <p><b>Location:</b> <?php echo $row['location']; ?></p>
        <p><?php echo substr($row['description'],0,100); ?>...</p>
        <a href="place_details.php?id=<?php echo $row['place_id']; ?>">View Details</a>
    </div>
<?php endwhile; ?>

</body>
</html>
