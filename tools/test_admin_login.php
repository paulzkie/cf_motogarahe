<?php
$url = 'http://localhost/cf_motogarahe/admin';
$post = [
    'acc_username' => 'admin',
    'acc_password' => '12345678'
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, false);
$response = curl_exec($ch);
if ($response === false) {
    echo "CURL_ERR: " . curl_error($ch) . "\n";
    exit(1);
}
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$effectiveUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);

echo "HTTP_CODE: $httpCode\n";
echo "EFFECTIVE_URL: $effectiveUrl\n\n";
// Show snippet of response to look for indicators
$snippet = substr($response, 0, 800);
echo "RESPONSE_SNIPPET:\n" . $snippet . "\n";
