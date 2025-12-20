
<?php
include "db.php";
$success = "";
$error = "";
if (isset($_POST['cancel'])) {
    $pnr = $_POST['pnr'];
    $check = mysqli_query($conn,
        "SELECT * FROM tickets WHERE pnr='$pnr' AND status='Booked'");
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($conn,
            "UPDATE tickets SET status='Cancelled' WHERE pnr='$pnr'");
        $success = "Ticket cancelled successfully.";
    } else {
        $error = "PNR not found or already cancelled.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cancel Ticket</title>
</head>
<body>
<h2>Cancel Ticket</h2>
<?php if ($success): ?>
    <p style="color:green;"><?php echo $success; ?></p>
<?php endif; ?>
<?php if ($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>
<form method="post">
    Enter PNR Number<br>
    <input type="text" name="pnr" required><br><br>
    <button type="submit" name="cancel">Cancel Ticket</button>
</form>
<br>
<a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
