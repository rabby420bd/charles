<?php

// Check if the username parameter is set in the URL
if(isset($_GET['username'])) {
    // Retrieve the username value from the URL parameter
    $username = $_GET['username'];

    // URL to send the request to
    $url = "https://www.highsocial.com/wp-admin/admin-ajax.php";

    // Data to send in the request body
    $data = array(
        'action' => 'get_user_account_id',
        'username' => $username
    );

    // Headers for the request
    $headers = array(
        'Host: www.highsocial.com',
        'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
        'Referer: https://www.highsocial.com/find-tiktok-user-id/',
        'User-Agent: Mozilla/5.0 (Linux; Android 11; RMX3231 Build/RP1A.201005.001) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.6167.165 Mobile Safari/537.36'
    );

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Disable SSL verification temporarily (try this only if you trust the target site)
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for errors
    if($response === false) {
        echo 'cURL error: ' . curl_error($ch);
    } else {
        // Check HTTP status code
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code !== 200) {
            echo 'HTTP error: ' . $http_code;
        } else {
            // Display response
            echo $response;
        }
    }

    // Close cURL session
    curl_close($ch);
} else {
    // If the username parameter is not set, display an error message or handle it accordingly
    echo "Username parameter is missing.";
}

?>
