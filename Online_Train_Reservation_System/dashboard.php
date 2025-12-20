<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
    <h2>Welcome <?php echo $_SESSION['username']; ?></h2>

    <div class="pill-actions">
        <a class="pill-btn" href="reserve.php">Reserve Ticket</a>
        <a class="pill-btn" href="view_tickets.php">View Tickets</a>
        <a class="pill-btn" href="cancel_by_pnr.php">Cancel Ticket</a>
        <a class="pill-btn" href="logout.php">Logout</a>
    </div>
</div>
</body>
</html>

