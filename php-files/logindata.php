<?php
session_start();

include 'dbconnection.php';

$error = $password_error = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];   
    $password = $_POST['password'];

    $sql_query = "SELECT id, Full_name FROM user WHERE E_mail = ? AND Confirm_Password = ?";
    $stmt = $conn->prepare($sql_query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Store user information in session if login successful
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $email;
        $_SESSION['fullname'] = $row['Full_name'];
        $_SESSION['logged_in'] = true;
        header("location: dashboard.php");
        exit();
    } 
    else {
        $password_error = "Email or password incorrect!";
    }
}
?>
