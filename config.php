// <?php
// // Database configuration
// $host = "mytask989.mysql.database.azure.com";  // Azure MySQL server
// $username = "shashank";             // Username with server suffix
// $password = "Login@123#456";                  // Password
// $database = "gymdb";                          // Database name

// // Enable error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// // Create connection
// $conn = new mysqli($host, $username, $password, $database, 3306);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// echo "Connected successfully!";
// ?>

<?php
// Database configuration
$host = "postgressdb989.postgres.database.azure.com";  // Azure PostgreSQL server
$username = "priyanka";                 // Username with server suffix
$password = "Login@123#456";                      // Password
$database = "gymdb";                              // Database name

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create connection
$conn = new mysqli($host, $username, $password, $database, 5432);  // Change port to 5432 for PostgreSQL

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";
?>
