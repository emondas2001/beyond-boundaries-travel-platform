<?php
session_start();
include("../config/db.php");

$id = $_GET['id'];

$hospital = $conn->query("SELECT * FROM hospitals WHERE hospital_id=$id")->fetch_assoc();
$doctors = $conn->query("SELECT * FROM doctors WHERE hospital_id=$id");
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $hospital['name']; ?></title>
</head>
<body>

<a href="hospitals.php">⬅ Back</a>

<h2><?php echo $hospital['name']; ?></h2>
<p><b>Location:</b> <?php echo $hospital['location']; ?></p>
<p><b>Ambulance Contact:</b> 📞 <?php echo $hospital['ambulance_phone']; ?></p>

<h3>👨‍⚕️ Available Doctors</h3>

<?php while($doc = $doctors->fetch_assoc()): ?>
    <div style="border:1px solid #aaa; padding:10px; margin:10px;">
        <p><b><?php echo $doc['name']; ?></b> (<?php echo $doc['specialization']; ?>)</p>
        <p>Fee: $<?php echo $doc['fee']; ?></p>

        <form method="POST" action="book_appointment.php">
            <input type="hidden" name="doctor_id" value="<?php echo $doc['doctor_id']; ?>">
            Date: <input type="date" name="date" required>
            <button type="submit">Book Appointment</button>
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
