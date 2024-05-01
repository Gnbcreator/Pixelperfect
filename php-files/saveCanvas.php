<?php
session_start(); // Start session to track logged-in user

if (!isset($_SESSION['logged_in'])) {
    echo "You must be logged in to save designs.";
    exit();
}

if(isset($_POST['canvasState'])){
    $canvasState = $_POST['canvasState'];
    echo "Canvas data received successfully.";
    echo "\n$canvasState";
} 
else {
    echo "Canvas data is not received.";
    exit();
}

// saving the canvas image
if(isset($_POST['imageData'])){
    $imageData = $_POST['imageData'];
    echo "ImageData received successfully.";
    echo "\n$imageData";
} 
else {
    echo "ImageData is not received.";
    exit();
}

if(isset($_SESSION['email'])){
    $user_email = $_SESSION['email'];
} 
else {
    echo "User email not found in session.";
    exit();
}

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
echo "\nConnected";

// Check if the record already exists for the user's design
$stmt_check = $conn->prepare("SELECT * FROM UserDesigns WHERE user_email = ?");
$stmt_check->bind_param("s", $user_email);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    // Update existing record
    $stmt_update = $conn->prepare("UPDATE UserDesigns SET design_state = ?, image_data = ? WHERE user_email = ?");
    $stmt_update->bind_param("sss", $canvasState, $imageData, $user_email);
    
    if ($stmt_update->execute()) {
        echo "\nData successfully updated in the database.";
    } else {
        echo "\nError updating data in the database: " . $stmt_update->error;
    }
    $stmt_update->close();
} else {
    // Insert new record if no existing record found
    $stmt_insert = $conn->prepare("INSERT INTO UserDesigns (user_email, design_state, image_data) VALUES (?, ?, ?)");
    $stmt_insert->bind_param("sss", $user_email, $canvasState, $imageData);
    
    if ($stmt_insert->execute()) {
        echo "\nData successfully stored in the database.";
    } else {
        echo "\nError storing data in the database: " . $stmt_insert->error;
    }
    $stmt_insert->close();
}

$stmt_check->close();
$conn->close();
?>
