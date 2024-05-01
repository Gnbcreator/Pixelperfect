<?php
// Extract the unique identifier from the URL
$url = $_SERVER['REQUEST_URI'];
$queryString = parse_url($url, PHP_URL_QUERY);
parse_str($queryString, $params);
$designId = $params['id'];

// Load the saved data corresponding to the design ID
$fileName = 'saved_designs/' . $designId . '.json';
if (file_exists($fileName)) {
    // Read the file contents
    $savedData = file_get_contents($fileName);
    // Decode JSON data
    $liveState = json_decode($savedData, true);
    // Access the live state data as needed, e.g., $liveState['canvasData']
    // You can then pass $liveState['canvasData'] to your JavaScript for loading into the canvas
} else {
    echo "Design not found!";
}
?>
