<?php
session_start();
include("../config/db.php");

$user_id   = $_SESSION['user_id'];
$vehicle_id = $_POST['vehicle_id'];
$driver_id  = $_POST['driver_id'];
$start      = $_POST['start_date'];
$end        = $_POST['end_date'];

$vehicle = $conn->query("SELECT price_per_day FROM vehicles WHERE vehicle_id=$vehicle_id")->fetch_assoc();
$price = $vehicle['price_per_day'];

$days = (strtotime($end) - strtotime($start)) / (60*60*24);
$total = $days * $price;

$conn->query("INSERT INTO vehicle_bookings (vehicle_id, driver_id, user_id, date)
              VALUES ($vehicle_id, $driver_id, $user_id, '$start')");

echo "✅ Vehicle booked successfully! Total Cost: $$total <br><a href='../dashboard.php'>Go to Dashboard</a>";
?>
