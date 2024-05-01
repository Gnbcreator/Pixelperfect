<?php
session_start();
include 'signupdata.php'; // Assuming this file contains your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user's email and image data from the AJAX request
    $userEmail = $_POST['email'];
    $imageData = $_POST['image'];

    // Perform database query to delete the row
    $query = "DELETE FROM UserDesigns WHERE user_email = '$userEmail' AND image_data = '$imageData'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Design deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error deleting design']);
    }
} else {
    // If request method is not POST, return error
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
