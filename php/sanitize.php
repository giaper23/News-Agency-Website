<?php

//This function sanitizes the data input for security reasons

function test_input($data) {

    $data = trim($data); // White spaces start and end
    $data = stripslashes($data); // Backlash \ etc.
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data;
  
  }
  
?>