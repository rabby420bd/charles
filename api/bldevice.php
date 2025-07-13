<?php

$url = 'https://myblapi.banglalink.net/api/v1/save-device-token';
$phone = $_GET['phone']; 

$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
    'Content-Length: 196',
    'Host: myblapi.banglalink.net',
    'Connection: Keep-Alive',
    'Accept-Encoding: gzip',
    'User-Agent: okhttp/4.9.3',
    'Cache-control: public, max-age=900, max-stale=900',
    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk1MGExOTYzMmUzYjMxMDE5YTk2OTkxZjNhZTk0ZTY4NWNmMTJlNDA0OGY3YTA2MWUyN2FjMjgyMWFjZTlhNjI1MmM1MzBhOTIyY2NhZjA1In0.eyJhdWQiOiJmOGViZTc2MC0wZWIzLTExZWEtOGIwOC00M2E4MmNjOWQxOGMiLCJqdGkiOiI5NTBhMTk2MzJlM2IzMTAxOWE5Njk5MWYzYWU5NGU2ODVjZjEyZTQwNDhmN2EwNjFlMjdhYzI4MjFhY2U5YTYyNTJjNTMwYTkyMmNjYWYwNSIsImlhdCI6MTcwNTE3NDQ5NCwibmJmIjoxNzA1MTc0NDk0LCJleHAiOjE3MzY3OTY4OTQsInN1YiI6IjU3ODkwODIiLCJzY29wZXMiOltdfQ.V3d7FlCLgPk0E671BzPuMkPkefnDJrKtEh-H7rg6kWnSinhUjpvsZ6McxwAbxnOb1SxLTjPdNO4LUyPMbSlb3M3RTUhFYZvKx4goKdVVapimxuBpTYcahAo4qUCwyiyYQs0fVI0YPyd4HO5H4hg_UTV1gzgfMjzB8-5GaRYyZ4nNQfu00l6JXRGYCQeFCH_VLr3FvXK7cchA2j1Bi48V8v5JdK1UaFn7dvBNWL8bnV6hBwRdxxLvQqQjxRv4n3HvSt-3QS0VigsRkqydG14fThacOgaYJm5udKMKS2p6XA0D6urG8E_D4m14Ml_JfBd_WDtFJz7vZRjnF4qI5B1QUYMm0TWUmorZTeALuTM4ZOQ_Rn5kcBEnFr8CUzlN1B8o-dswRp8Npw5gI_ZXobiQXY7gdTpKoTal_7GE6EATj-gUDDw2kC64AwtsJw3GVvXIU32s7yT9GBRHztUjdgwgeVxxr3psmPpR3fms5eKQrB6XxZXN0OJRLzFSvaT9ddS5nXFZs_Vanc2zvxDayYUW9b05ViHzhr_cumifJeVCq82M1olOl8FdHsCJOV-qLnWvPjwKJ66-HVgYj0HJDy1NtMb4o_opesPuzDLvc7rNQVRu6lfDzsXtUtNKnualVq9dJuQROxe3X0NnhOxgMlOdZsbNTn18TaMqGRJqdkvNVeU',
    'platform: android',
    'app-version: 11.3.1',
    'version-code: 1103001',
    'api-client-pass: 1E6F751EBCD16B4B719E76A34FBA9',
    'msisdn:  . $phone',
    'connection-type: prepaid'
);

$data = array(
    'phone' => $phone,
    'device_token' => 'f8HagvaiRDi8vFUhMv1jwI:APA91bEIxRIR6kbTNPa7hkf2-LmyfEitdbfbQtpiH9VjTBkvP7ELNzxn3ZN04-xics5QEtGcMNgzwC78oWGpeWJY40JlZMRVFdHmsTDmNpnJZFXxDJnjsHZ4b1t13RDy7HL9hObnH3mr'
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Decode gzip response
$response = gzdecode($response);

// Parse JSON response
$json_response = json_decode($response, true);

echo json_encode($json_response, JSON_PRETTY_PRINT);

?>
