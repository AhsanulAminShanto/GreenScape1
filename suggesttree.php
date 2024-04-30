<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Suggestion</title>
</head>
<body>
    <h2>Plant Suggestion</h2>
    <form action="" method="get">
        <label for="city">City:</label>
        <input type="text" id="city" name="city" placeholder="Enter city name">
        <br><br>
        <button type="submit">Search</button>
    </form>

    <?php
    if (isset($_GET['city'])) {
        // Retrieve city name from the form
        $city = $_GET['city'];

        // Connect to the database
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

        // Prepare SQL statement to retrieve city data
        $stmt = $conn->prepare("SELECT * FROM city_data WHERE city = ?");
        $stmt->bind_param("s", $city);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch city data
            $cityData = $result->fetch_assoc();

            // Close statement
            $stmt->close();

            // Call the plant.id API and suggest suitable plant based on city data
            $apiKey = 'SaubAg4dkmK0H3COath8gthvlaIbMrxFo3Vdca2vJO581pe863';
            $params = [
                'soil_type' => $outdoor_info['soil_type'],
                'light' => $outdoor_info['light'],
                'water_level' => $outdoor_info['water_level'],
                'max_level_available' => $outdoor_info['max_level_available'],
                'total_area' => $outdoor_info['total_area'],
                'tree_type' => $outdoor_info['tree_type'],
                'soil_ph' => $outdoor_info['soil_ph'],
                'nutrients' => $outdoor_info['nutrients'],
                'maintenance_frequency' => $outdoor_info['maintenance_frequency'],
                'alternative' => $outdoor_info['alternative']
            ];

            $url = 'https://api.plant.id/v2/suggest?' . http_build_query($params);
            $plantData = json_decode(file_get_contents($url), true);

            // Display suggested plant
            if (isset($plantData['suggestions'])) {
                echo "<h3>Suggested Plant for $city:</h3>";
                echo "<ul>";
                foreach ($plantData['suggestions'] as $suggestion) {
                    echo "<li>{$suggestion['scientific_name']} ({$suggestion['common_name']})</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No plant suggestions found for $city.</p>";
            }
        } else {
            echo "<p>No data found for city: $city</p>";
        }

        // Close database connection
        $conn->close();
    }
    ?>
</body>
</html>
