<?php
session_start();
include("../config/db.php");

$user_id = $_SESSION['user_id'];
$food_id = $_POST['food_id'];
$qty     = $_POST['qty'];

$food = $conn->query("SELECT restaurant_id, price FROM foods WHERE food_id=$food_id")->fetch_assoc();
$total = $food['price'] * $qty;

$conn->query("INSERT INTO food_orders (user_id, restaurant_id, total_price)
              VALUES ($user_id, {$food['restaurant_id']}, $total)");

echo "✅ Order placed successfully! Total Bill: $$total <br><a href='../dashboard.php'>Go to Dashboard</a>";
?>
