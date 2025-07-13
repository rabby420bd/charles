<?php
// Check if the 'prompt' parameter is set in the GET request
if (isset($_GET['prompt'])) {
    // URL encode the prompt parameter to safely include it in the API request
    $prompt = urlencode($_GET['prompt']);
    // API endpoint URL with the encoded prompt parameter
    $apiUrl = "https://dall-e-tau-steel.vercel.app/kshitiz?prompt={$prompt}";

    // Make the GET request to the API
    $response = file_get_contents($apiUrl);

    // Check if the response is not FALSE
    if ($response !== FALSE) {
        // Decode the JSON response into an associative array
        $data = json_decode($response, true);

        // Check if the 'response' key exists in the decoded data
        if (isset($data['response'])) {
            // Extract the image URL from the response
            $imageUrl = $data['response'];

            // Get the image content
            $imageContent = file_get_contents($imageUrl);

            // Check if the image content was successfully retrieved
            if ($imageContent !== FALSE) {
                // Set the content-type header to image/png
                header('Content-Type: image/png');
                // Output the image content
                echo $imageContent;
                exit;
            } else {
                // Print an error message if the image content could not be fetched
                echo "Failed to fetch the image content.";
                exit;
            }
        } else {
            // Print an error message if the 'response' key is not found in the API response
            echo "No image found in the response.";
            exit;
        }
    } else {
        // Print an error message if the API request failed
        echo "Failed to fetch the API response.";
        exit;
    }
} else {
    // Print an error message if the 'prompt' parameter is not provided
    echo "Please provide a prompt.";
    exit;
}
?>
