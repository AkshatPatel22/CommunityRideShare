<?php
/**
 * Copyright © 2025 Akshat Patel. All rights reserved.
 * This file is part of Community Ride Share.
 * Unauthorized copying of this file, via any medium, is strictly prohibited.
 * For inquiries, contact: axathpatel@gmail.com
 */

// logout.php - User logout script
session_start();
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session
header('Location: login.html'); // Redirect to login page
exit();
?>
