<?php
include "db.php";
session_start();
$username = $_SESSION['username']; // or fixed username
$result = mysqli_query($conn,
 "SELECT pnr, train_name, source, destination, journey_date, status 
 FROM tickets 
 WHERE username='$username'
 ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
 <title>My Booked Tickets</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card table-card">
  <h2>My Booked Tickets</h2>
      <table class="ticket-table">
      <thead><tr>
                <th>PNR</th>
                <th>Train</th>
                <th>From</th>
                <th>To</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
             <td><?php echo $row['pnr']; ?></td>
             <td><?php echo $row['train_name']; ?></td>
             <td><?php echo $row['source']; ?></td>
             <td><?php echo $row['destination']; ?></td>
             <td><?php echo $row['journey_date']; ?></td>
             <td>
            <span class="status <?php echo strtolower($row['status']); ?>">
            <?php echo $row['status']; ?>
            </span>
            </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <a class="back-link" href="dashboard.php">← Back to Dashboard</a>
</div>

</body>
</html>
