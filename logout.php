<?php
// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Unset all of the session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect the user to the login page
header("Location: login.php");
exit;
?>
