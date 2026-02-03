<?php
session_start();
include("../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($pass, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            header("Location: ../dashboard.php");
        } else {
            echo "Wrong password!";
        }
    } else {
        echo "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Beyond Boundaries</title>
</head>
<body>
<h2>Login</h2>
<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
<a href="register.php">Create new account</a>

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
