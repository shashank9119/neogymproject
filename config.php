<?php
// Database configuration
$host = "mytask989.mysql.database.azure.com";  // or your database server (e.g., "localhost")
$username = "shashank";   // your MySQL username (default is "root" for XAMPP)
$password = "Login@123#456";       // your MySQL password (default is empty for XAMPP)
$database = "gymdb"; // your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
