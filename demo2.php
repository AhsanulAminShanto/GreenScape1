<?php
// Include database configuration
include 'db_config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $soilType = $_POST["soil_type"];
    $waterLevel = $_POST["water_level"];

    // Prepare and execute SQL query to insert data into table
    $sql = "INSERT INTO outdoor_info (soil_type, water_level) VALUES ('$soilType', '$waterLevel')";
    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Load JSON data from file
    $jsonString = file_get_contents('db.json');
    $jsonData = json_decode($jsonString, true);

    // Initialize variables to store matching results
    $matchingResults = array();

    // Loop through the JSON data to find matching records
    foreach ($jsonData as $record) {
        // Check if keys exist before accessing them
        if (isset($record['soil_type']) && isset($record['water_level'])) {
            if ($record['soil_type'] == $soilType && $record['water_level'] == $waterLevel) {
                $matchingResults[] = $record;
            }
        }
    }

    // Display matching results
    if (!empty($matchingResults)) {
        echo "<h2>Matching Results:</h2>";
        echo "<ul>";
        foreach ($matchingResults as $result) {
            echo "<li>";
            // Check if keys exist before accessing them
            if (isset($result['name'])) {
                echo "<strong>Name:</strong> " . $result['name'] . "<br>";
            }
            if (isset($result['scientific_name'])) {
                echo "<strong>Scientific Name:</strong> " . $result['scientific_name'] . "<br>";
            }
            if (isset($result['family'])) {
                echo "<strong>Family:</strong> " . $result['family'] . "<br>";
            }
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "No matching results found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outdoor Improvement - Manual Mode</title>
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
    </ul>
</nav>
<h2>Outdoor Improvement - Manual Mode</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="soil_type">Soil Type:</label>
    <input type="text" id="soil_type" name="soil_type" required><br><br>

    <label for="water_level">Water Level:</label>
    <input type="text" id="water_level" name="water_level" required><br><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>

