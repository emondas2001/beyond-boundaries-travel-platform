<?php
session_start();
include("../config/db.php");

$id = $_GET['id'];

$restaurant = $conn->query("SELECT * FROM restaurants WHERE restaurant_id=$id")->fetch_assoc();
$foods = $conn->query("SELECT * FROM foods WHERE restaurant_id=$id");
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $restaurant['name']; ?></title>
</head>
<body>

<a href="restaurants.php">⬅ Back</a>

<h2><?php echo $restaurant['name']; ?></h2>
<p><b>Location:</b> <?php echo $restaurant['location']; ?></p>
<p><b>Rating:</b> ⭐ <?php echo $restaurant['rating']; ?></p>

<h3>🍔 Menu</h3>

<?php while($food = $foods->fetch_assoc()): ?>
    <div style="border:1px solid #aaa; padding:10px; margin:10px;">
        <p><b><?php echo $food['name']; ?></b> - $<?php echo $food['price']; ?></p>

        <form method="POST" action="order_food.php">
            <input type="hidden" name="food_id" value="<?php echo $food['food_id']; ?>">
            Quantity: <input type="number" name="qty" value="1" min="1">
            <button type="submit">Order</button>
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
