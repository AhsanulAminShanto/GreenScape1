<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "greendbms";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve latitude and longitude from POST request
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Generate a project number (for demonstration purposes, you may use your own logic)
$projectNumber = generateProjectNumber();

// Insert data into the 'project' table
$sql = "INSERT INTO project (latitude, longitude, project_number) VALUES ('$latitude', '$longitude', '$projectNumber')";

if ($conn->query($sql) === TRUE) {
    // If the insertion was successful, return the project number
    echo "Project successfully stored. Project Number: " . $projectNumber;
} else {
    // If there was an error with the insertion, display an error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

// Function to generate a unique project number (for demonstration purposes)
function generateProjectNumber() {
    // You can use your own logic to generate a project number
    // For example, you could use a timestamp, a random number, or a combination of both
    return uniqid('PROJ'); // Generates a unique project ID based on current timestamp
}
?>
