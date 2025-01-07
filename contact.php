<?php
// Include the database connection file
include('config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data using $_POST
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';

    try {
        // Prepare SQL query using prepared statements for security
        $sql = "INSERT INTO contact_form (name, email, phone, message) VALUES (:name, :email, :phone, :message)";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':message', $message);

        // Execute the query
        if ($stmt->execute()) {
            echo "Your message has been sent successfully.";
        } else {
            echo "Failed to send your message. Please try again.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Close the connection
$conn = null;
?>
