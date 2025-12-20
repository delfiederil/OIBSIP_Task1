<?php
include "db.php";
$success = "";
$error = "";
if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Username already exists. Please login.";
    } else {
        $insert = "INSERT INTO users (username, password)
                   VALUES ('$username', '$password')";
        if (mysqli_query($conn, $insert)) {
            $success = "Registration successful. Please login.";
        } else {
            $error = "Something went wrong. Try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
    <h2>Create Account</h2>
    <?php if ($success): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endif; ?>
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button class="btn" type="submit" name="register">Register</button>
    </form>
    <a class="back-link" href="index.php">Back to Login</a>
</div>
</body>
</html>
