


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indoor Improvement</title>
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

<h2>Indoor Improvement</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="soil_type">Soil Type:</label><br>
    <input type="radio" id="sandy" name="soil_type" value="Sandy Soil" required>
    <label for="sandy">Sandy Soil</label><br>
    <input type="radio" id="silt" name="soil_type" value="Silt Soil">
    <label for="silt">Silt Soil</label><br>
    <input type="radio" id="clay" name="soil_type" value="Clay Soil">
    <label for="clay">Clay Soil</label><br>
    <input type="radio" id="loamy" name="soil_type" value="Loamy Soil">
    <label for="loamy">Loamy Soil</label><br><br>
    
    <label for="light_mode">Light Mode:</label><br>
    <select id="light_mode" name="light_mode" required>
        <option value="hard">Hard</option>
        <option value="medium">Medium</option>
        <option value="low">Low</option>
    </select><br><br>
    
    <label for="light_time">Light Time (hours):</label><br>
    <input type="number" id="light_time" name="light_time" required><br><br>
    
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
    $lightMode = $_POST["light_mode"];
    $lightTime = $_POST["light_time"];

    // Prepare and execute SQL query to insert data into table
    $sql = "INSERT INTO indoor_info (soil_type, light_mode, light_time) VALUES ('$soilType', '$lightMode', '$lightTime')";
    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Read indoorplant.json file
    $jsonFile = file_get_contents('indoorplant.json');
    if ($jsonFile === false) {
        echo "Error reading JSON file<br>";
    } else {
        $jsonData = json_decode($jsonFile, true);

        if ($jsonData === null || !isset($jsonData['trees'])) {
            echo "Invalid JSON format or missing 'trees' key<br>";
        } else {
            // Compare form data with JSON data (case-insensitive)
            $matchesFound = false;
            foreach ($jsonData['trees'] as $tree) {
                if (strtolower($tree['soil_type']) === strtolower($soilType) && $tree['light_mode'] === $lightMode && $tree['light_time'] == $lightTime) {
                    $matchesFound = true;
                    echo "Matching plant found: " . $tree['name'] . "<br>";
                }
            }

            if (!$matchesFound) {
                echo "No matching plants found.<br>";
            }
        }
    }
}
?>
