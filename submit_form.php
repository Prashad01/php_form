<?php
// Database connection
$servername = "github";
$username = "Prashad"; // Change to your MySQL username
$password = "Prashad@9707"; // Change to your MySQL password
$dbname = "user_info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO users (name, email, phone_number) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $phone);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
