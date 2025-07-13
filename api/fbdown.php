<?php

header("Content-Type: application/json");

$response = array();

if(isset($_GET['url'])) {
    $url = $_GET['url'];

    // Set headers
    $headers = array(
        'X-RapidAPI-Key: 3a6008168fmshc89e2b9e019262ap1db9f8jsne1aad62d8bff',
        'X-RapidAPI-Host: facebook-reel-and-video-downloader.p.rapidapi.com'
    );

    // Set options for fetch
    $options = array(
        'http' => array(
            'method' => 'GET',
            'header' => implode("\r\n", $headers)
        )
    );

    // Create a stream context
    $context = stream_context_create($options);

    // Make the request
    $data = file_get_contents('https://facebook-reel-and-video-downloader.p.rapidapi.com/app/main.php?url='.$url, false, $context);

    if ($data !== false) {
        $decoded_data = json_decode($data, true);

        if ($decoded_data !== null) {
            $response['status'] = 'success';
            $response['data'] = $decoded_data;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Invalid JSON response';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'An error occurred while fetching data';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'URL parameter is missing';
}

echo json_encode($response);

?>
