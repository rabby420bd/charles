<?php
$phn = $_REQUEST["phone"];
$url = "https://api3.bioscopelive.com/auth/api/v2/login/send-otp";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "Accept: */*",
   "Accept-Language: en",
   "Accept-Encoding: gzip, deflate, br",
   "Content-Type: application/json",
   "Access-code: QkQ%3D",
   "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiI0MWVkY2JkMy1kNjNlLTRiYmQtOTQxYy04MGE4NmI5ODY2YTkiLCJpc3MiOiJIRUlNREFMTCIsInJvbGVzIjpbIlJPTEVfVVNFUiIsIlJPTEVfVVNFUl9BTk9OWU1PVVMiXSwidXNlcm5hbWUiOiJhbm9ueW1vdXMiLCJjbGllbnRfbG9naW5faWQiOjUwMzc2NTI0NjYxLCJjbGllbnRfaWQiOm51bGwsInBsYXRmb3JtX2lkIjoiYzNjOThkMWItYzU4MS00NTJkLWEzODUtOTQxY2E2OTQwMWU5IiwiYm9uZ29faWQiOiI0MWVkY2JkMy1kNjNlLTRiYmQtOTQxYy04MGE4NmI5ODY2YTkiLCJ1c2VyX3R5cGUiOiJhbm9ueW1vdXMiLCJpYXQiOjE2OTAxMDU4OTYsImV4cCI6MTY5Nzg4MTkwNi4wLCJjb3VudHJ5Q29kZSI6IkJEIn0.Q8swLozIROvZYQfoJ10oUb3pUp7iyEKBASictMrrIKuuS756l1pgQAIo0FkYUo_PKbog452KzkmkMZP62qPKdFPqcY0PaNm0EOzeVzQE5NcUhdRVt_L869xYdMgOie6Y9wqr9vG3HYt-Iaxcjsk3exHpIJ7_cKcDCWVj_K5qa5gQZPvhfsHhp-OC3Bu7ehdvBGHYej3bduwgNNUoXuNWsmlIaYXVUj07Z89Po88lEa7LFjQn0Ba44hwAd4NWsLr7Dt5g94cFNOfDRXMD3Yn2uik5vJoEMIkElILcAhDwi8-ppSMZuvWxo0ZqrKqw8vmEYq5OaZodw-9kXjRdFfRoehvixYGIwhd-buLj3-rWxC0axQkYO1_kzdR7osMLoV4-wUEi20QHiBydAvEz3aPTLTBaa24bpBHixKSIlcXn6g8VfjiyjcVCJl06Le7VZuUh5DitEtxIb1AhD37o7F7LLBmx-em_Btqkt9VXA3VzO-YkTaTiAUL5k7kzHlUo1l-ntaWW2cGwXOHmoTbyquYbWjMN5AzoikInwBjOPKtr2GVfv4OhCJET0KnVE5DnSdGQmq8K-_syt2-lFbgzEEAfEuVi6ivuJ4VSkiJOzSWLN5EE8dNRmBpOLYmn00o7BKoDC3Ob9FJDMDOpqpGS2CTk6C6iVIx2uaiYZ8KyHemYm2A",
   "platform-id: c3c98d1b-c581-452d-a385-941ca69401e9",
   "Country-Code: QkQ%3D",
   "client-id: c3c98d1b-c581-452d-a385-941ca69401e9",
   "Content-Length: 236",
   "Origin: https://gp.bioscopelive.com",
   "Connection: keep-alive",
   "Referer: https://gp.bioscopelive.com/",
   "Sec-Fetch-Dest: empty",
   "Sec-Fetch-Mode: cors",
   "Sec-Fetch-Site: same-site",
   "TE: trailers",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"operator"=>"all","msisdn"=>"88".$phn,"token"=>"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJleHAiOjE2OTg5MDExMDcuMH0.zT13KMjCsK7afD0nyxlThTb0ZGc7Jn0T7IzenKoFvsUJxtfBccNvkiyk-FRnSQh66buvqLjzL8p4CjGt0xYv8g","token_type"=>"CUSTOM_TOKEN_V1"
);

$data = json_encode($ps);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>

