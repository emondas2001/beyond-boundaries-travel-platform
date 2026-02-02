<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Beyond Boundaries</title>
</head>
<body>
<h2>Welcome, <?php echo $_SESSION['name']; ?> 🌍</h2>

<ul>
    <li><a href="places/explore.php">Explore Places</a></li>
    <li><a href="#">Hotels</a></li>
    <li><a href="#">Hospitals</a></li>
    <li><a href="#">Guides</a></li>
    <li><a href="#">Restaurants</a></li>
    <li><a href="#">Vehicles</a></li>
    <li><a href="auth/logout.php">Logout</a></li>
</ul>

</body>
</html>
