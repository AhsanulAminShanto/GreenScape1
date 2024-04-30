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
        <label for="soil_type">Soil Type:</label><br>
        <input type="radio" id="sandy" name="soil_type" value="sandy" required>
        <label for="sandy">Sandy Soil</label><br>
        <input type="radio" id="silt" name="soil_type" value="silt">
        <label for="silt">Silt Soil</label><br>
        <input type="radio" id="clay" name="soil_type" value="clay">
        <label for="clay">Clay Soil</label><br>
        <input type="radio" id="loam" name="soil_type" value="loam">
        <label for="loam">Loamy Soil</label><br><br>

        <label for="water_level">Water Level:</label><br>
        <select id="water_level" name="water_level" required>
            <option value="Low">Low</option>
            <option value="Moderate">Moderate</option>
            <option value="High">High</option>
        </select><br><br>

        <label for="max_level_available">Maximum Level Available:</label><br>
        <input type="text" id="max_level_available" name="max_level_available" required><br><br>

        <label for="total_area">Total Area:</label><br>
        <input type="text" id="total_area" name="total_area" required><br><br>

        <label for="tree_type">Tree Type:</label><br>
        <input type="text" id="tree_type" name="tree_type" required><br><br>

        <label for="soil_ph">Soil pH:</label><br>
        <input type="text" id="soil_ph" name="soil_ph" required><br><br>

        <label for="nutrients">Nutrients:</label><br>
        <input type="text" id="nutrients" name="nutrients" required><br><br>

        <label for="maintenance_frequency">Maintenance Frequency:</label><br>
        <select id="maintenance_frequency" name="maintenance_frequency" required>
            <option value="Weekly">Weekly</option>
            <option value="Bi-weekly">Bi-weekly</option>
            <option value="Monthly">Monthly</option>
        </select><br><br>

        <label for="alternative">Alternative:</label><br>
        <input type="text" id="alternative" name="alternative" required><br><br>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br><br>

        <button type="submit">Submit</button>
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

<?php
// Database configuration
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "greendbms"; // Replace with your database name

// Create connection
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // If connection fails, display error message
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $soilType = strtolower($_POST["soil_type"]); // Convert to lowercase
    $waterLevel = strtolower($_POST["water_level"]); // Convert to lowercase
    $maxLevelAvailable = $_POST["max_level_available"];
    $totalArea = $_POST["total_area"];
    $treeType = $_POST["tree_type"];
    $soilPh = $_POST["soil_ph"];
    $nutrients = $_POST["nutrients"];
    $maintenanceFrequency = $_POST["maintenance_frequency"];
    $alternative = $_POST["alternative"];
    $address = $_POST["address"];

    // Prepare SQL statement to insert data into the database
    $stmt = $pdo->prepare("INSERT INTO outdoor_info(soil_type, water_level, max_level_available, total_area, tree_type, soil_ph, nutrients, maintenance_frequency, alternative, address) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Execute the prepared statement
    $stmt->execute([$soilType, $waterLevel, $maxLevelAvailable, $totalArea, $treeType, $soilPh, $nutrients, $maintenanceFrequency, $alternative, $address]);

    // Get the auto-incremented ID generated for the last inserted row
    $id = $pdo->lastInsertId();

    // Load JSON data from ab.json
    $abJsonString = file_get_contents('ab.json');
    $abData = json_decode($abJsonString, true);

    // Append new data to the JSON array
    $newData = array(
        'id' => $id,
        'soil_type' => $soilType,
        'water_level' => $waterLevel,
        'max_level_available' => $maxLevelAvailable,
        'total_area' => $totalArea,
        'tree_type' => $treeType,
        'soil_ph' => $soilPh,
        'nutrients' => $nutrients,
        'maintenance_frequency' => $maintenanceFrequency,
        'alternative' => $alternative,
        'address' => $address
    );

    $abData[] = $newData;

    // Encode the array back into JSON and write to the file
    file_put_contents('ab.json', json_encode($abData, JSON_PRETTY_PRINT));

    // Display success message
    echo "Data stored successfully.";

    // You can also redirect the user to another page after storing the data
    // header("Location: success.php");
    // exit();
}
?>
