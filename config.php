<?php
// Database configuration
$host = "myserverdb989.database.windows.net";  // Azure SQL Server hostname
$username = "shashank";   // Database username
$password = "Login@123#456";  // Database password
$database = "mysqldb989"; // Database name

// Create connection using PDO
try {
    $conn = new PDO("sqlsrv:server=$host;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
