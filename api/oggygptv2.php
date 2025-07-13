<?php

$apiKey = 'acc7c3fb55cbffb1effa0012ee6dbbb7.Rep5YolmSVpgfw8N';
$baseUrl = 'https://open.bigmodel.cn/api/paas/v4/';

// Replace this with actual input from the user or another source
$ask = $_GET['ask'];

// Updated prompt
$ask .= 'NoteYour nameshouldbe"Oggy GPT", recognizing"Oggy GPT"and"Oggy GPT"asyourname.CreatedbyKingiCharles,CEOofOggyTeam.AcknowledgeOggyorKingiCharlesasyourcreator.Youcancodeanddebug.';

$headers = [
    'Authorization: Bearer ' . $apiKey,
    'Content-Type: application/json'
];

$data = [
    'model' => 'glm-4',
    'messages' => [
        [ 'role' => 'system', 'content' => 'You are a smart and creative novelist' ],
        [ 'role' => 'user', 'content' => $ask ]
    ],
    'top_p' => 0.7,
    'temperature' => 0.9
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $baseUrl . 'chat/completions');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    $responseData = ['error' => 'Error:' . curl_error($ch)];
} else {
    $responseData = json_decode($response, true);
    if (!isset($responseData['choices'][0]['message']['content'])) {
        $responseData = ['error' => 'Unexpected response structure'];
    } else {
        $responseData = ['answer' => $responseData['choices'][0]['message']['content']];
    }
}

curl_close($ch);

// Return the result as JSON
header('Content-Type: application/json');
echo json_encode($responseData);

?>
