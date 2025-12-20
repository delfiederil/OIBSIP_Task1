<?php
include "db.php";
$success = "";
$error = "";
if (isset($_POST['cancel'])) {
    $pnr = trim($_POST['pnr']);
    $check = mysqli_query(
        $conn,
        "SELECT * FROM tickets WHERE pnr='$pnr' AND status='Booked'"
    );
    if (mysqli_num_rows($check) === 1) {
        mysqli_query(
            $conn,
            "UPDATE tickets SET status='Cancelled' WHERE pnr='$pnr'"
        );
        header("Location: cancel_by_pnr.php?success=1");
        exit();
    } else {
        $error = "Invalid PNR or ticket already cancelled.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Cancel Ticket</title></head>
<link rel="stylesheet" href="style.css">
<body>
<div class="card">
    <h2>Cancel Ticket</h2>
    <?php if (isset($_GET['success'])): ?>
        <p class="success">Ticket cancelled successfully.</p>
    <?php endif; ?>
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post">
        <input
            type="text"
            name="pnr"
            placeholder="Enter PNR Number"
            required
        >
        <button class="btn" type="submit" name="cancel">
            Cancel Ticket
        </button>
    </form>
    <a class="back-link" href="dashboard.php">← Back to Dashboard</a>
</div>
</body>
</html>
