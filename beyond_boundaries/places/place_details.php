<?php
session_start();
include("../config/db.php");

$id = $_GET['id'];

$place = $conn->query("SELECT * FROM places WHERE place_id=$id")->fetch_assoc();
$activities = $conn->query("SELECT * FROM activities WHERE place_id=$id");
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $place['name']; ?></title>
</head>
<body>

<a href="explore.php">⬅ Back</a>

<h2><?php echo $place['name']; ?></h2>
<p><b>Location:</b> <?php echo $place['location']; ?></p>
<p><b>Category:</b> <?php echo $place['category']; ?></p>
<p><b>Entry Fee:</b> $<?php echo $place['entry_fee']; ?></p>
<p><b>Best Time:</b> <?php echo $place['best_time_to_visit']; ?></p>
<p><?php echo $place['description']; ?></p>

<h3>🎯 Activities Available</h3>
<ul>
<?php while($act = $activities->fetch_assoc()): ?>
    <li><?php echo $act['activity_name']; ?> - $<?php echo $act['cost']; ?></li>
<?php endwhile; ?>
</ul>

<form method="POST" action="add_wishlist.php">
    <input type="hidden" name="place_id" value="<?php echo $place['place_id']; ?>">
    <button type="submit">❤️ Add to Wishlist</button>
</form>

</body>
</html>
