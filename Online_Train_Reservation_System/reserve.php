<?php 
include "db.php";
 session_start();
  $success = ""; 
  $pnr = ""; 
  if (isset($_POST['reserve'])) {
     $username = $_SESSION['username']; // or fixed username 
      $train = $_POST['train']; 
      $from = $_POST['from']; $to = $_POST['to']; 
      $date = $_POST['date'];
       // 1️⃣ Insert ticket WITHOUT PNR first
        $insert = "INSERT INTO tickets (username, train_name, source, destination, journey_date, status) 
        VALUES ('$username', '$train', '$from', '$to', '$date', 'Booked')"; 
        if (mysqli_query($conn, $insert)) { 
            // 2️⃣ Get last inserted ID
             $last_id = mysqli_insert_id($conn);
              // 3️⃣ Generate predictable PNR
               $pnr = "PNR" . str_pad($last_id, 6, "0", STR_PAD_LEFT); // 4️⃣ Update ticket with generated PNR
                mysqli_query($conn, "UPDATE tickets SET pnr='$pnr' WHERE id=$last_id");
                 $success = "Ticket Reserved Successfully!"; }
                  } 
                  ?>
                  <!DOCTYPE html>
                   <html> 
                    <head> 
                        <title>Reserve Ticket</title>
                        <link rel="stylesheet" href="style.css">

                     </head> 
                     <body>

<div class="card">
    <h2>Reserve Ticket</h2>
    <?php if ($success): ?>
        <p class="success"><?php echo $success; ?></p>
        <p><b>Your PNR:</b> <?php echo $pnr; ?></p>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="train" placeholder="Train Name" required>

        <input type="text" name="from" placeholder="From" required>

        <input type="text" name="to" placeholder="To" required>

        <input type="date" name="date" required>

        <button class="btn" type="submit" name="reserve">Book</button>
    </form>
    <a class="back-link" href="dashboard.php">← Back to Dashboard</a>
</div>
</body>
</html>
