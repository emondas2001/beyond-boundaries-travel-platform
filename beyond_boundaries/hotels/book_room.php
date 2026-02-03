<?php
session_start();
include("../config/db.php");

$user_id = $_SESSION['user_id'];
$room_id = $_POST['room_id'];
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];

// Get room price
$room = $conn->query("SELECT price_per_night FROM rooms WHERE room_id=$room_id")->fetch_assoc();
$price = $room['price_per_night'];

// Calculate days
$days = (strtotime($check_out) - strtotime($check_in)) / (60 * 60 * 24);
$total = $days * $price;

// Insert booking
$conn->query("INSERT INTO hotel_bookings (user_id, room_id, check_in, check_out, total_price)
              VALUES ($user_id, $room_id, '$check_in', '$check_out', $total)");

// Mark room unavailable
$conn->query("UPDATE rooms SET availability=0 WHERE room_id=$room_id");

echo "✅ Booking Confirmed! <a href='../dashboard.php'>Go to Dashboard</a>";
?>
