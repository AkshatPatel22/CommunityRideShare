<?php
/**
 * Copyright © 2025 Akshat Patel. All rights reserved.
 * This file is part of Community Ride Share.
 * Unauthorized copying of this file, via any medium, is strictly prohibited.
 * For inquiries, contact: axathpatel@gmail.com
 */

// search_ride.php - Searching for rides script
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $origin = $_GET['origin'];
    $destination = $_GET['destination'];

    // Prepare SQL statement to search for rides
    $sql = "SELECT * FROM rides WHERE origin = ? AND destination = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$origin, $destination]);
    $rides = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($rides) {
        foreach ($rides as $ride) {
            echo "Ride from {$ride['origin']} to {$ride['destination']} at {$ride['departure_time']}. Seats available: {$ride['seats_available']}<br>";
        }
    } else {
        echo 'No rides found.';
    }
}


?>
