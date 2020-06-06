<?php

// Import DotEnv variables
$db_username = $_ENV['DB_USERNAME'];
$db_password = $_ENV['DB_PASSWORD'];
$db_name = $_ENV['DB_NAME'];

// DB connexxion
$db = new mysqli("localhost", $db_username, $db_password, $db_name)
or die(mysqli_error($db));
?>