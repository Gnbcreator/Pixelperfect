<?php

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
echo "";

?>