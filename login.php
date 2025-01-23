<?php
/**
 * Copyright © 2025 Akshat Patel. All rights reserved.
 * This file is part of Community Ride Share.
 * Unauthorized copying of this file, via any medium, is strictly prohibited.
 * For inquiries, contact: axathpatel@gmail.com
 */

// login.php - User login script
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement to check if the user exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: index.php'); // Redirect to homepage after successful login
        exit();
    } else {
        echo 'Invalid email or password.';
    }
}
?>
