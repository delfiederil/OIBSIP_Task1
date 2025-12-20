<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
    <h2>🚆 Online Train Reservation System</h2>
<p class="subtitle">
    Reserve, view, and manage your train tickets easily in one place.
</p>
    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button class="btn" type="submit">Login</button>
    </form>
    <a href="register.php" class="link">New user? Register here</a>
</div>
</body>
</html>

