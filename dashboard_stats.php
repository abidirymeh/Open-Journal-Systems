<?php
header('Content-Type: application/json');

// Base URL
$baseUrl = 'http://192.168.1.65/ojs/index.php/humanite/stats';

// Endpoints OJS
$statsEndpoints = [
    'publications' => $baseUrl . '/publications/publications',
    'editorial'    => $baseUrl . '/editorial/editorial',
    'users'        => $baseUrl . '/users/users',
];

// Tu dois récupérer ce cookie après t’être connecté à OJS
$cookie = 'OJSSID=J7RSw9v6Ni3jYJ02d73QDPo6Dx0sPeLUxZH7yBf6';

$results = [];

foreach ($statsEndpoints as $key => $url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Cookie: ' . $cookie,
        'Accept: application/json'
    ]);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($response === false || $httpCode !== 200) {
        $results[$key] = [
            'error' => "Erreur pour $key : " . curl_error($ch),
            'status' => $httpCode,
            'raw' => $response
        ];
    } else {
        $results[$key] = json_decode($response, true);
    }

    curl_close($ch);
}

echo json_encode($results);
