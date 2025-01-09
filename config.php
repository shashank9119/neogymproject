<?php
// Database configuration
$host = "shankserver989.database.windows.net";  // Azure SQL Server hostname
$username = "shahsank";   // Database username
$password = "Login@123#456";  // Database password
$database = "mydatashank898"; // Database name

// Create connection using PDO
try {
    $conn = new PDO("sqlsrv:server=$host;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
