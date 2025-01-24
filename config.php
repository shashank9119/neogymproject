<?php
// Database configuration
$host = "localhost";  // or your database server (e.g., "localhost")
$username = "root";   // your MySQL username (default is "root" for XAMPP)
$password = "";       // your MySQL password (default is empty for XAMPP)
$database = "gym"; // your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
