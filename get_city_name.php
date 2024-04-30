<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Name Result</title>
</head>
<body>
    <h2>City Name Result</h2>

    <?php
    // Check if latitude and longitude are provided in the URL
    if (isset($_GET['latitude']) && isset($_GET['longitude'])) {
        $latitude = $_GET['latitude'];
        $longitude = $_GET['longitude'];

        // Call Google Maps Geocoding API to find city name
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$latitude},{$longitude}&key=AIzaSyA7adNXOqV_BAsGi_AihmCGw1cO0RCeoTc";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if ($data['status'] == "OK") {
            $cityName = "";
            // Find city name from address components
            foreach ($data['results'][0]['address_components'] as $component) {
                if (in_array('locality', $component['types'])) {
                    $cityName = $component['long_name'];
                    break;
                }
            }
            echo "<p>Latitude: $latitude, Longitude: $longitude</p>";
            echo "<p>City: $cityName</p>";
        } else {
            echo "<p>Error retrieving city name for latitude: $latitude, longitude: $longitude</p>";
        }
    } else {
        echo "<p>Please provide latitude and longitude.</p>";
    }
    ?>
</body>
</html>
