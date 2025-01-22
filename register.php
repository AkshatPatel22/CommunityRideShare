<?php
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
