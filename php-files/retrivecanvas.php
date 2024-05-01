<?php
session_start(); // Start session to track logged-in user

// Include connection details
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

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    die("User not logged in.");
}

// Retrieve user's email from session
$user_email = $_SESSION['email'];

// Fetch canvas data from the database for the logged-in user
$query = "SELECT design_state FROM UserDesigns WHERE user_email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();

// Check if data is retrieved successfully
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    $canvasData = $row['design_state'];

    // Prepare response array
    $response = array(
        "success" => true,
        "canvas_state" => $canvasData
    );

    // Send canvas data to the client
    echo json_encode($response);
} else {
    // No canvas data found for this user
    $response = array(
        "success" => false,
        "message" => "No canvas data found for this user."
    );

    // Send failure message to the client
    echo json_encode($response);
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
