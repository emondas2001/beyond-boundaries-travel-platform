<?php
session_start();
include("../config/db.php");

$user_id   = $_SESSION['user_id'];
$doctor_id = $_POST['doctor_id'];
$date      = $_POST['date'];

$conn->query("INSERT INTO appointments (user_id, doctor_id, appointment_date)
              VALUES ($user_id, $doctor_id, '$date')");

echo "✅ Appointment booked successfully!<br><a href='../dashboard.php'>Go to Dashboard</a>";
?>
