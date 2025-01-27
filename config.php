<?php
// Database configuration
$host = "mytask989.mysql.database.azure.com";  // Azure MySQL server
$username = "shashank@mytask989";             // Username with server suffix
$password = "Login@123#456";                  // Password
$database = "gymdb";                          // Database name

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create connection
$conn = new mysqli($host, $username, $password, $database, 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";
?>
