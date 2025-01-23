<?php
/**
 * Copyright © 2025 Akshat Patel. All rights reserved.
 * This file is part of Community Ride Share.
 * Unauthorized copying of this file, via any medium, is strictly prohibited.
 * For inquiries, contact: axathpatel@gmail.com
 */

// post_ride.php - Posting a ride script
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $origin = $_POST['origin'];
        $destination = $_POST['destination'];
        $departure_time = $_POST['departure_time'];
        $seats_available = $_POST['seats_available'];

        // Prepare SQL statement
        $sql = "INSERT INTO rides (user_id, origin, destination, departure_time, seats_available) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        // Execute the statement with the form data
        if ($stmt->execute([$user_id, $origin, $destination, $departure_time, $seats_available])) {
            echo 'Ride posted successfully!';
        } else {
            echo 'Error posting the ride.';
        }
    } else {
        echo 'You must be logged in to post a ride.';
    }
}
?>
