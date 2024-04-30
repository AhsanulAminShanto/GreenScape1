<!DOCTYPE html>
<html>
<head>
    <title>Tree Suggestions</title>
</head>
<body>
    <h2>Enter City Name</h2>
    <form method="get" action="">
        <label for="city">City Name:</label>
        <input type="text" id="city" name="city" required>
        <button type="submit">Search</button>
    </form>

    <?php
    if (isset($_GET['city'])) {
        // Load the contents of db.json into an associative array
        $db_json = file_get_contents('db.json');
        $db_data = json_decode($db_json, true);

        // Get the city name from the user input
        $city_name = $_GET['city'];

        // Load the contents of city.json into an associative array
        $city_json = file_get_contents('city.json');
        $city_data = json_decode($city_json, true);

        // Find the city information based on the provided city name
        $found_city = null;
        foreach ($city_data['city'] as $city) {
            if ($city['name'] === $city_name) {
                $found_city = $city;
                break;
            }
        }

        // If city not found, display error message
        if (!$found_city) {
            echo "<p>City not found.</p>";
        } else {
            // Initialize an array to store suggested trees
            $suggested_trees = [];

            // Compare the city's soil information with each tree in the database
            foreach ($db_data['trees'] as $tree) {
                if ($tree['soil_type'] === $found_city['soil_type'] &&
                    $tree['water_level'] === $found_city['water_level'] &&
                    $tree['total_area'] === $found_city['total_area'] &&
                    $tree['soil_ph'] === $found_city['soil_ph'] &&
                    $tree['average_height_m'] >= $found_city['average_height_m']) {
                    $suggested_trees[] = $tree;
                }
            }

            // If no suggested trees found, display message
            if (empty($suggested_trees)) {
                echo "<p>No suggested trees found for the city.</p>";
            } else {
                // Display suggested trees
                echo "<h2>Suggested trees for city '$city_name':</h2>";
                foreach ($suggested_trees as $tree) {
                    echo "<p>Name: " . $tree['name'] . "<br>";
                    echo "Scientific Name: " . $tree['scientific_name'] . "<br>";
                    echo "Family: " . $tree['family'] . "<br>";
                    echo "Average Height (m): " . $tree['average_height_m'] . "<br>";
                    echo "Average Diameter (cm): " . $tree['average_diameter_cm'] . "<br>";
                    echo "Lifespan (years): " . $tree['lifespan_years'] . "<br>";
                    echo "Image URL: <img src='" . $tree['image_url'] . "' alt='" . $tree['name'] . "'></p><br>";
                }
            }
        }
    }
    ?>
</body>
</html>
