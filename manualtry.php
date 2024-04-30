


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


<?php
// Include database configuration
include 'db_config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $soilType = strtolower($_POST["soil_type"]); // Convert to lowercase
    $waterLevel = strtolower($_POST["water_level"]); // Convert to lowercase

    // Load JSON data from db.json
    $dbJsonString = file_get_contents('db.json');
    $dbData = json_decode($dbJsonString, true);

    // Initialize an array to store matching results
    $matchingResults = array();

    // Check if db.json data exists and is in the correct format
    if (isset($dbData['trees']) && is_array($dbData['trees'])) {
        // Loop through db.json data to find matching records
        foreach ($dbData['trees'] as $tree) {
            if (isset($tree['soil_type']) && isset($tree['water_level']) &&
                strtolower($tree['soil_type']) === $soilType && strtolower($tree['water_level']) === $waterLevel) {
                $matchingResults[] = $tree;
            }
        }
    }

    // Display matching results
    if (!empty($matchingResults)) {
        echo "<h2>Matching Results:</h2>";
        echo "<ul>";
        foreach ($matchingResults as $result) {
            echo "<li>";
            echo "<strong><span style='font-size: 18px; font-weight: bold;'>Name:</span></strong> " . $result['name'] . "<br>";
            echo "<strong>Scientific Name:</strong> " . $result['scientific_name'] . "<br>";
            echo "<strong>Family:</strong> " . $result['family'] . "<br>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "No matching results found in db.json.";
    }
}
?>


