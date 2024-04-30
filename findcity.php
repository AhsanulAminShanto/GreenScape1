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
