<?php

// Define the login page URL
$login_page_url = 'https://moodle.caseine.org/login/index.php';

// Use cURL to retrieve the HTML of the login page
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $login_page_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);

// Use regular expressions to extract the logintoken value from the HTML
preg_match('/<input type="hidden" name="logintoken" value="([^"]+)">/', $html, $matches);
$logintoken = $matches[1];

// Define the login URL and the data to be sent with the request
$login_url = 'https://moodle.caseine.org/login/index.php';
$username = 'testcna';
$password = '*TestCNA38+';
$anchor = '';
$data = array(
    'username' => $username,
    'password' => $password,
    'logintoken' => $logintoken,
    'anchor' => $anchor
);

// Use cURL to make the POST request to the login URL with the data
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $login_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

// Check if the login was successful
if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200) {
    echo 'Login successful!';
} else {
    echo 'Login failed!';
}

curl_close($ch);

?>
