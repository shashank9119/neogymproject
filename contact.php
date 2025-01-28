// <?php
// // Include the database connection file
// include('config.php');

// // Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Retrieve form data using $_POST
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $message = $_POST['message'];

//     // Sanitize and validate input (optional, but recommended)
//     $name = mysqli_real_escape_string($conn, $name);
//     $email = mysqli_real_escape_string($conn, $email);
//     $phone = mysqli_real_escape_string($conn, $phone);
//     $message = mysqli_real_escape_string($conn, $message);

//     // Insert data into the database
//     $sql = "INSERT INTO contact_form (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

//     if ($conn->query($sql) === TRUE) {
//         // Success message (you can redirect or show a success message)
//         echo "Your message has been sent successfully.";
//     } else {
//         // Error message if insert fails
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

// // Close the connection
// $conn->close();
// ?>

<?php
// Include database connection
include('config.php');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and validate input data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';

    // Check if any field is empty
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        die("Error: All fields are required.");
    }

    // Sanitize input data
    $name = pg_escape_string($conn, $name);
    $email = pg_escape_string($conn, $email);
    $phone = pg_escape_string($conn, $phone);
    $message = pg_escape_string($conn, $message);

    // Insert data using prepared statement
    $sql = "INSERT INTO contact_form (name, email, phone, message) VALUES ($1, $2, $3, $4)";
    $stmt = pg_prepare($conn, "insert_query", $sql);

    if (!$stmt) {
        die("Error in preparing statement: " . pg_last_error($conn));
    }

    $result = pg_execute($conn, "insert_query", array($name, $email, $phone, $message));

    if ($result) {
        echo "Success: Your message has been sent.";
    } else {
        echo "Error inserting data: " . pg_last_error($conn);
    }
}

// Close database connection
pg_close($conn);
?>
