<?php
// Database configuration parameters
$servername = "localhost"; // Change this to your database host name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "greendbms"; // Change this to your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
 