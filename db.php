<?php
// db.php - Database connection file
$host = 'localhost:3306';
$dbname = 'community_rideshare';
$user = 'root';
$password = 'Akshat@22.10';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
