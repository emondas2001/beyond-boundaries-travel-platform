<?php
session_start();
include("../config/db.php");

$user_id = $_SESSION['user_id'];
$place_id = $_POST['place_id'];

$conn->query("INSERT INTO wishlist (user_id, place_id) VALUES ($user_id, $place_id)");

header("Location: place_details.php?id=$place_id");
?>
