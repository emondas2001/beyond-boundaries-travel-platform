<?php
session_start();
include("../config/db.php");

$id = $_GET['id'];

$hotel = $conn->query("SELECT * FROM hotels WHERE hotel_id=$id")->fetch_assoc();
$rooms = $conn->query("SELECT * FROM rooms WHERE hotel_id=$id AND availability=1");
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $hotel['name']; ?></title>
</head>
<body>

<a href="hotels.php">⬅ Back</a>

<h2><?php echo $hotel['name']; ?></h2>
<p><b>Location:</b> <?php echo $hotel['location']; ?></p>
<p><?php echo $hotel['description']; ?></p>
<p><b>Rating:</b> ⭐ <?php echo $hotel['rating']; ?></p>

<h3>🛏 Available Rooms</h3>

<?php while($room = $rooms->fetch_assoc()): ?>
    <div style="border:1px solid #aaa; padding:10px; margin:10px;">
        <p><b>Room Type:</b> <?php echo $room['room_type']; ?></p>
        <p><b>Price per Night:</b> $<?php echo $room['price_per_night']; ?></p>

        <form method="POST" action="book_room.php">
            <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
            Check-in: <input type="date" name="check_in" required>
            Check-out: <input type="date" name="check_out" required>
            <button type="submit">Book Now</button>
        </form>
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
