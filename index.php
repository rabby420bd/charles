<?php

$path = $_SERVER["REQUEST_URI"];

// Remove leading slash
$path = ltrim($path, '/');

// Remove 'api/' prefix if present
if (strpos($path, 'api/') === 0) {
    $path = substr($path, 4);
}

// Remove query string
$path = strtok($path, '?');

// Append .php if not present
if (pathinfo($path, PATHINFO_EXTENSION) === '') {
    $path .= '.php';
}

$filePath = __DIR__ . '/' . $path;

if (file_exists($filePath)) {
    require_once $filePath;
} else {
    http_response_code(404);
    echo '404 Not Found';
}

?>
