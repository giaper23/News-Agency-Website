<?php

// Start the session
session_start();

// Unset the email 
unset($_SESSION['email']);

// Destroy the session
session_destroy();

// Relocate back to home
header("Location: ../index.php");

// Kill script after redirect
die();

?>