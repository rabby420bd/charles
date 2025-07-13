<?php
// The URL of the image
$imageUrl = "https://api.screenshotmachine.com/?key=d68fa9&url=www.windy.com/?24.025,90.677,6&device=phone&dimension=480x800&format=png&cacheLimit=0&delay=0";

// Fetch the image from the URL
$imageContent = file_get_contents($imageUrl);

// Check if the image content was successfully fetched
if ($imageContent === FALSE) {
    die("Error fetching the image.");
}

// Set the content type header to display the image
header("Content-Type: image/png");

// Output the image content directly to the browser
echo $imageContent;
?>
