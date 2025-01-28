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
$username = "priyanka";  // Ensure full username
$password = "Login@123#456";  // Password
$database = "gymdb";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create connection
$conn = pg_connect("host=$host dbname=$database user=$username password=$password port=5432 sslmode=require");

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>
