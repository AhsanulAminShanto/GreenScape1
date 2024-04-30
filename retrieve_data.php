<?php
// Include database configuration
include 'db_config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $soilType = $_POST["soil_type"];
    $light = $_POST["light"];
    $waterLevel = $_POST["water_level"];
    $maxLevelAvailable = $_POST["max_level_available"];
    $totalArea = $_POST["total_area"];
    $treeType = $_POST["tree_type"];
    $soilPH = $_POST["soil_ph"];
    $nutrients = $_POST["nutrients"];
    $maintenanceFrequency = $_POST["maintenance_frequency"];
    $alternative = $_POST["alternative"];
    $address = $_POST["address"];

    // Prepare and execute SQL query to insert data into table
    $sql = "INSERT INTO outdoor_info (soil_type, light, water_level, max_level_available, total_area, tree_type, soil_ph, nutrients, maintenance_frequency, alternative, address) VALUES ('$soilType', '$light', '$waterLevel', '$maxLevelAvailable', '$totalArea', '$treeType', '$soilPH', '$nutrients', '$maintenanceFrequency', '$alternative', '$address')";
    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outdoor Improvement - Manual Mode</title>
</head>
<body>
    <h2>Outdoor Improvement - Manual Mode</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="soil_type">Soil Type:</label>
        <input type="text" id="soil_type" name="soil_type" required><br><br>
        
        <!-- Add other input fields here -->
        
        <input type="submit" value="Submit">
        <button type="submit" name="save_button">Save</button>
    </form>
</body>
</html>
