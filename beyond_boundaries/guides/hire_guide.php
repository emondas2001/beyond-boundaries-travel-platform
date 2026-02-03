<?php
session_start();
include("../config/db.php");

$user_id  = $_SESSION['user_id'];
$guide_id = $_POST['guide_id'];
$date     = $_POST['date'];

$conn->query("INSERT INTO guide_bookings (user_id, guide_id, booking_date)
              VALUES ($user_id, $guide_id, '$date')");

echo "✅ Guide booked successfully!<br><a href='../dashboard.php'>Go to Dashboard</a>";
?>
