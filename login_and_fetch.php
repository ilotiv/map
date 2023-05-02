<?php
// login_and_fetch.php
$url = 'https://moodle.caseine.org/login/index.php';
$username = 'testcna';
$password = '*TestCNA38+';

$ch = curl_init();

// First, fetch the login page to get the logintoken
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');

$response = curl_exec($ch);

preg_match('/name="logintoken" value="(.+?)"/', $response, $matches);
$token = $matches[1];

// Now, login with the username, password, and logintoken
$post_data = http_build_query([
    'username' => $username,
    'password' => $password,
    'logintoken' => $token
]);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

$response = curl_exec($ch);

// After logging in, you can fetch the desired content
// Replace the URL with the page you want to fetch after logging in
$fetch_url = 'https://moodle.caseine.org/some_page_after_login';
curl_setopt($ch, CURLOPT_URL, $fetch_url);
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_HTTPGET, 1);

$content = curl_exec($ch);
curl_close($ch);

echo $content;
?>
