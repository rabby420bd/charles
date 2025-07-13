<?php

function get_user_cookie($user_email, $user_password) {
    $url = 'https://n.facebook.com';
    $xurl = $url . '/login.php';
    $user_agent = "Mozilla/5.0 (Linux; Android 4.1.2; GT-I8552 Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36";
    $headers = array(
        'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'accept-language' => 'en_US',
        'cache-control' => 'max-age=0',
        'sec-ch-ua' => '"Not?A_Brand";v="8", "Chromium";v="108", "Google Chrome";v="108"',
        'sec-ch-ua-mobile' => '?0',
        'sec-ch-ua-platform' => "Windows",
        'sec-fetch-dest' => 'document',
        'sec-fetch-mode' => 'navigate',
        'sec-fetch-site' => 'same-origin',
        'sec-fetch-user' => '?1',
        'upgrade-insecure-requests' => '1',
        'user-agent' => $user_agent
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response_body = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $inspect = new DOMDocument();
    @$inspect->loadHTML($response_body);
    $lsd_key = $inspect->getElementById('lsd')->getAttribute('value');
    $jazoest_key = $inspect->getElementById('jazoest')->getAttribute('value');
    $m_ts_key = $inspect->getElementById('m_ts')->getAttribute('value');
    $li_key = $inspect->getElementById('li')->getAttribute('value');
    $try_number_key = $inspect->getElementById('try_number')->getAttribute('value');
    $unrecognized_tries_key = $inspect->getElementById('unrecognized_tries')->getAttribute('value');
    $bi_xrwh_key = $inspect->getElementById('bi_xrwh')->getAttribute('value');

    $data = array(
        'lsd' => $lsd_key,
        'jazoest' => $jazoest_key,
        'm_ts' => $m_ts_key,
        'li' => $li_key,
        'try_number' => $try_number_key,
        'unrecognized_tries' => $unrecognized_tries_key,
        'bi_xrwh' => $bi_xrwh_key,
        'email' => $user_email,
        'pass' => $user_password,
        'login' => 'submit'
    );

    $ch2 = curl_init();
    curl_setopt($ch2, CURLOPT_URL, $xurl);
    curl_setopt($ch2, CURLOPT_POST, true);
    curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch2, CURLOPT_TIMEOUT, 300);
    $response_body2 = curl_exec($ch2);
    curl_close($ch2);

    $cookies = array();
    preg_match_all('/Set-Cookie:(?<cookie>.*)\b/', $response_body2, $cookies);

    foreach ($cookies['cookie'] as $cookie) {
        $cookie_parts = explode(';', $cookie);
        $cookie_name_value = explode('=', trim($cookie_parts[0]), 2);
        if ($cookie_name_value[0] == 'c_user') {
            return $cookie;
        }
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['email']) && isset($_GET['password'])) {
    $email = $_GET['email'];
    $password = $_GET['password'];
    $cookie = get_user_cookie($email, $password);
    if ($cookie) {
        echo json_encode(array('cookie' => $cookie));
    } else {
        http_response_code(400);
        echo json_encode(array('error' => 'Login failed. Invalid email or password.'));
    }
} else {
    http_response_code(400);
    echo json_encode(array('error' => 'Missing email or password parameters.'));
}

?>
