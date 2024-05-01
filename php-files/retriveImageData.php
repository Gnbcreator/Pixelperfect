<?php
// Start session
session_start();

// Database connection parameters
$servername = "localhost";
$username = "id21926697_root";
$password = "PixelPerfect111#";
$dbname = "id21926697_ui_designer_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email is set in session
if (!isset($_SESSION['email'])) {
    die("User email not found in session.");
}

// Retrieve email from session
$user_email = $_SESSION['email'];

// Retrieve image data from the database
$sql = "SELECT image_data FROM UserDesigns WHERE user_email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();

$response = array();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['success'] = true;
    $response['image_data'] = $row['image_data'];
} else {
    $response['success'] = false;
    $response['message'] = "No image data found for this user.";
}

$stmt->close();
$conn->close();

// Return response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
