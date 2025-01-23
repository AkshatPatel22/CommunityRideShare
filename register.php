<?php
/**
 * Copyright © 2025 Akshat Patel. All rights reserved.
 * This file is part of Community Ride Share.
 * Unauthorized copying of this file, via any medium, is strictly prohibited.
 * For inquiries, contact: axathpatel@gmail.com
 */

// register.php - User registration script
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Prepare SQL statement
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    // Execute the statement with the form data
    if ($stmt->execute([$username, $email, $password])) {
        echo 'Registration successful!';
    } else {
        echo 'Error during registration.';
    }
}
?>
