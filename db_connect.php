<?php
require 'config.php'; // Import database credentials

// Connect to Database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set Charset (Recommended for UTF-8)
$conn->set_charset("utf8");
?>
