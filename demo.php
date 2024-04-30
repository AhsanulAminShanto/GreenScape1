<?php
// Include database configuration
include 'db_config.php';

// Fetch data from the database
$sql = "SELECT * FROM outdoor_info";
$result = mysqli_query($conn, $sql);

// Initialize an array to store the data
$data = array();

// Check if there are any rows in the result set
if (mysqli_num_rows($result) > 0) {
    // Fetch each row and add it to the data array
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

// Convert the data array to JSON format
$jsonData = json_encode($data, JSON_PRETTY_PRINT);

// Write the JSON data to a file
$file = 'ab.json';
if (file_put_contents($file, $jsonData)) {
    echo "Data retrieved and saved to JSON file successfully!";
} else {
    echo "Error writing JSON data to file!";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help US build a database into JSON</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="indoor.php">Indoor Improvement</a></li>
        <li><a href="outdoor.php">Outdoor Improvement</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="demo.php">Help US</a></li>
    </ul>
</nav>
<p><h1>We will add those data into our database and after recheck we will build the process that we will help others by
    giving API for the Bangladesh differnet place data like soil type,water lavel,ph value etc.
</h1></p>
</body>
</html>
