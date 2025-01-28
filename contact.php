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
// Include the database connection file
include('config.php');  // Assuming config.php sets up PostgreSQL connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Sanitize and validate input (optional, but recommended)
    $name = pg_escape_string($conn, $name);
    $email = pg_escape_string($conn, $email);
    $phone = pg_escape_string($conn, $phone);
    $message = pg_escape_string($conn, $message);

    // Insert data into the database using prepared statements
    $sql = "INSERT INTO contact_form (name, email, phone, message) VALUES ($1, $2, $3, $4)";
    $stmt = pg_prepare($conn, "insert_query", $sql);

    // Execute prepared statement with actual data
    $result = pg_execute($conn, "insert_query", array($name, $email, $phone, $message));

    if ($result) {
        // Success message (you can redirect or show a success message)
        echo "Your message has been sent successfully.";
    } else {
        // Error message if insert fails
        echo "Error: Failed to insert data into the database.";
    }
}

// Close the connection
pg_close($conn);
?>
