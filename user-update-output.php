<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "disscuss";

session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure the user is logged in and has an ID
if (!isset($_SESSION['user']['id'])) {
    die("You must be logged in to update your details.");
}

$user_id = $_SESSION['user']['id']; // Get user ID from session

// Get new username and password from POST
$new_username = isset($_POST['username']) ? trim($_POST['username']) : "";
$new_password = isset($_POST['password']) ? trim($_POST['password']) : "";

// Validate input
if (empty($new_username) || empty($new_password)) {
    die("Username and password cannot be empty.");
}

// Update query (no password hashing)
$sql = "UPDATE users SET username = ?, password = ?, updated_at = NOW() WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $new_username, $new_password, $user_id);

if ($stmt->execute()) {
    echo "Username and password updated successfully!";
} else {
    echo "Error updating details: " . $stmt->error;
}

$stmt->close();
$conn->close();
