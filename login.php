<?php
// fetch_token.php
$url = 'https://moodle.caseine.org/login/index.php';
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

$response = curl_exec($ch);
curl_close($ch);

preg_match('/name="logintoken" value="(.+?)"/', $response, $matches);

if (!empty($matches[1])) {
    echo $matches[1];
} else {
    echo 'Error: Token not found';
}
?>
