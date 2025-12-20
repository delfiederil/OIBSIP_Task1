<?php
$conn = mysqli_connect("localhost", "root", "", "train_reservation");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
