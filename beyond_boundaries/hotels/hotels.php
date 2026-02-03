<?php
session_start();
include("../config/db.php");

$result = $conn->query("SELECT * FROM hotels");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotels - Beyond Boundaries</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/main.js" defer></script>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <h1>Beyond Boundaries</h1>
    <div>
        <a href="../dashboard.php">Dashboard</a>
        <a href="../auth/logout.php">Logout</a>
    </div>
</div>

<div class="container">

    <h2>🏨 Available Hotels</h2>
    <p>Comfortable stays for your journey.</p>

    <div class="hotel-grid">

        <?php while($hotel = $result->fetch_assoc()): ?>
            <div class="hotel-card">
                
                <!-- Placeholder image -->
                <img src="https://images.unsplash.com/photo-1560347876-aeef00ee58a1?crop=entropy&cs=tinysrgb&fit=max&h=400&w=600" class="hotel-img">



                <div class="hotel-content">
                    <h3><?php echo $hotel['name']; ?></h3>
                    
                    <p><b>Location:</b> <?php echo $hotel['location']; ?></p>
                    
                    <p>
                        <?php echo substr($hotel['description'], 0, 80); ?>...
                    </p>

                    <p class="price-tag">⭐ Rating: <?php echo $hotel['rating']; ?> / 5</p>

                    <a href="hotel_details.php?id=<?php echo $hotel['hotel_id']; ?>" class="btn">
                        View Details
                    </a>
                </div>

            </div>
        <?php endwhile; ?>

    </div>

</div>

<!-- FOOTER -->
<div class="footer">
    © 2026 Beyond Boundaries | Travel Without Limits
</div>

</body>
</html>
