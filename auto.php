<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Mode - Get Current Location</title>
    <link rel="stylesheet" href="style3.css">
    <!-- Load Google Maps API asynchronously -->
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7adNXOqV_BAsGi_AihmCGw1cO0RCeoTc&callback=initMap&libraries=places">
    </script>
    <style>
        /* Set map height */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
    <style>
        .tree-image {
            width: 100px;
            height: 100px;
        }
    </style>
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
<h2>Auto Mode - Get Current Location</h2>
<button onclick="getLocation()">Allow Location Access</button>
<div id="map"></div>
<button onclick="storeLocation()">Store Location</button>
<p id="projectNumber"></p>

<script>
    let map;

    function initMap() {
        // Initialize map centered at a default location
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
        });
    }

    function getLocation() {
        // Check if geolocation is supported by the browser
        if (navigator.geolocation) {
            // Get current location
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        // Retrieve latitude and longitude
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;

        // Center map to current location
        map.setCenter({lat: lat, lng: lng});

        // Add marker to current location
        new google.maps.Marker({
            position: {lat: lat, lng: lng},
            map: map,
            title: 'Your Location'
        });

        // Display latitude and longitude in console
        console.log('Latitude:', lat);
        console.log('Longitude:', lng);

        // Store latitude and longitude in a hidden input fields
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    }

    function storeLocation() {
        // Get latitude and longitude from current map center
        var lat = map.getCenter().lat();
        var lng = map.getCenter().lng();

        // Send data to server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "store_location.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Display project number returned from server along with latitude and longitude
                document.getElementById("projectNumber").innerHTML = "Project Number: " + xhr.responseText + "<br>Latitude: " + lat + "<br>Longitude: " + lng;
            }
        };
        xhr.send("latitude=" + lat + "&longitude=" + lng);
    }
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Name Finder</title>
</head>
<body>
    <h2>City Name Finder</h2>
    <form action="" method="get">
        <label for="latitude">Latitude:</label>
        <input type="text" id="latitude" name="latitude" placeholder="Enter latitude">
        <br><br>
        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" name="longitude" placeholder="Enter longitude">
        <br><br>
        <button type="submit">Search</button>
    </form>

    <?php
if (isset($_GET['latitude']) && isset($_GET['longitude'])) {
    // Retrieve latitude and longitude from the form
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];

    // Call the API and get the data
    $apiKey = '2OREA42FMLC6BPORVYN2SMQT18SZ5I9T';
    $params['format'] = 'json';
    $params['lat'] = $latitude;
    $params['lng'] = $longitude;

    $query = http_build_query($params);
    $url = 'https://api.geodatasource.com/city?key=' . $apiKey . '&' . $query;
    $response = file_get_contents($url);

    // Decode the JSON response
    $data = json_decode($response);

    // Store the data in the database
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

    // Prepare SQL statement
    $sql = "INSERT INTO city_data (country, region, city, latitude, longitude, currency_code, currency_name, currency_symbol, sunrise, sunset, time_zone, distance_km) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssssssssssd", $data->country, $data->region, $data->city, $data->latitude, $data->longitude, $data->currency_code, $data->currency_name, $data->currency_symbol, $data->sunrise, $data->sunset, $data->time_zone, $data->distance_km);

    // Execute statement
    $stmt->execute();

    // Check for errors
    if ($stmt->error) {
        echo "Error: " . $stmt->error;
    } else {
        echo "Data inserted successfully!";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
<?php
    if (isset($_GET['latitude']) && isset($_GET['longitude'])) {
        $apiKey = '2OREA42FMLC6BPORVYN2SMQT18SZ5I9T';
        $params['format'] = 'json';
        $params['lat'] = $_GET['latitude'];
        $params['lng'] = $_GET['longitude'];

        $query = '';

        foreach ($params as $key => $value) {
            $query .= '&' . $key . '=' . rawurlencode($value);
        }

        $result = file_get_contents('https://api.geodatasource.com/city?key=' . $apiKey . $query);

        $data = json_decode($result);

        echo "<h3>City Name:</h3>";
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    ?>
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
                    echo "Image URL: <img src='" . $tree['image_url'] . "' alt='" . $tree['name'] . "'class='tree-image'></p><br>";
                }
            }
        }
    }
    ?>
</body>
</html>

