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
    <link rel="stylesheet" href="assets/css/style.css">
<script src="assets/js/main.js" defer></script>

</head>
<body>
<h2>Welcome, <?php echo $_SESSION['name']; ?> 🌍</h2>
<div class="navbar">
    <h1>Beyond Boundaries</h1>
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="auth/logout.php">Logout</a>
    </div>
</div>

<div class="container">

<div class="hero">
    <h2>Welcome to Beyond Boundaries 🌍</h2>
    <p>Your all-in-one platform for travel, booking, and exploring the world.</p>
</div>

<div class="services">

    <div class="service-card">
        <div class="service-icon">🌍</div>
        <h3>Explore Places</h3>
        <p>Discover tourist spots and attractions.</p>
        <a href="places/explore.php" class="btn">Explore</a>
    </div>

    <div class="service-card">
        <div class="service-icon">🏨</div>
        <h3>Hotels</h3>
        <p>Book comfortable hotels at best prices.</p>
        <a href="hotels/hotels.php" class="btn">Book Hotel</a>
    </div>

    <div class="service-card">
        <div class="service-icon">🍽</div>
        <h3>Restaurants</h3>
        <p>Find food and order meals easily.</p>
        <a href="restaurants/restaurants.php" class="btn">Find Food</a>
    </div>

    <div class="service-card">
        <div class="service-icon">🚗</div>
        <h3>Vehicles</h3>
        <p>Rent cars, bikes, and buses with drivers.</p>
        <a href="vehicles/vehicles.php" class="btn">Rent Now</a>
    </div>

    <div class="service-card">
        <div class="service-icon">🏥</div>
        <h3>Hospitals</h3>
        <p>Locate hospitals and book appointments.</p>
        <a href="hospitals/hospitals.php" class="btn">View Hospitals</a>
    </div>

    <div class="service-card">
        <div class="service-icon">👨‍✈️</div>
        <h3>Tour Guides</h3>
        <p>Hire experienced local guides.</p>
        <a href="guides/guides.php" class="btn">Hire Guide</a>
    </div>

</div>


</div>

<div class="footer">
    © 2026 Beyond Boundaries | Travel Without Limits
</div>


</body>
</html>
