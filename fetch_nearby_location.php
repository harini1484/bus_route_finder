<?php
error_reporting(0);
include("dbconnect.php");

$input = file_get_contents("php://input");
$data = json_decode($input, true);
$rdate = date("d-m-Y");

if (isset($data['lat']) && isset($data['lon'])) {
    $user_lat = floatval($data['lat']);
    $user_lon = floatval($data['lon']);

    function calculateDistance($lat1, $lon1, $lat2, $lon2) {
        $earth_radius = 6371; // Earth's radius in km
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earth_radius * $c;
    }

    function getPlaceName($lat, $lon) {
        $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat=$lat&lon=$lon&zoom=18&addressdetails=1";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0'); // Required by Nominatim
        $response = curl_exec($ch);
        curl_close($ch);
    
        $data = json_decode($response, true);
    
        if (isset($data['display_name'])) {
            return $data['display_name'];
        } else {
            return "Unknown Place"; // Fallback if no place name is found
        }
    }
    $query = mysqli_query($connect, "SELECT * FROM bus_route");
    $products_found = false;

    while ($row = mysqli_fetch_assoc($query)) {
        $product_lat = floatval($row['lat']);
        $product_lon = floatval($row['lon']);

        $distance = calculateDistance($user_lat, $user_lon, $product_lat, $product_lon);

       /*  if ($distance <= 30) { 
            $products_found = true; */
            $busno = $row['busno'];


            $query1 = mysqli_query($connect, "SELECT * FROM booking WHERE busno='$busno' AND rdate='$rdate'");

            while ($feth = mysqli_fetch_assoc($query1)) {
                $user = $feth['user'];
                $query2 = mysqli_query($connect, "SELECT * FROM users WHERE username='$user'");
                $fetch2 = mysqli_fetch_assoc($query2);

                $mobile = $fetch2['mobile'];
                $name = $fetch2['name']; 
                $mess = "Destination nearby: $distance km";

                $place = getPlaceName($user_lat1, $user_lat1);
                echo '<iframe src="http://iotcloud.co.in/testsms/sms.php?sms=emr&name=' . urlencode($name) . '&mess=' . urlencode($mess) . '&mobile=' . urlencode($mobile) . '" width="10" height="10"></iframe>';
            }

            echo '<script>
                setTimeout(function () {
                    window.location.href = "index.php";
                }, 5000);
            </script>';
       /*  } */
    }

   /*  if (!$products_found) {
        echo 'No buses found nearby.';
    } */
    /* function getPlaceName($lat, $lon) {
        // Your Google Maps API Key
        $apiKey = 'AIzaSyAzfJHU7mKkVKW9nTVPymNY-0emhlP-0DQ';  // Replace with your API key
    
        // Google Maps Geocoding API URL
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lon&key=$apiKey";
    
        // Use cURL to make the API request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
    
        // Check if the response is valid
        if ($response === FALSE) {
            return "Unknown Place";
        }
    
        // Decode the JSON response
        $data = json_decode($response, true);
    
        // Check if the place name is available
        if (isset($data['results'][0]['formatted_address'])) {
            return $data['results'][0]['formatted_address'];
        } else {
            return "Unknown Place";
        }
    }
    
    // Example usage
    $user_lat = 12.971598; // Replace with actual latitude
    $user_lon = 77.594566; // Replace with actual longitude
    
    $place_name = getPlaceName($user_lat, $user_lon);
    echo "The place name for latitude $user_lat and longitude $user_lon is: $place_name"; */
} else {
    echo 'Invalid location data.';
}
?>
