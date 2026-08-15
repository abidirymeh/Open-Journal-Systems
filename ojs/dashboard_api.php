<?php
header('Content-Type: application/json');

// Changer le chemin si nécessaire
$base = 'http://192.168.1.65/ojs/index.php/humanite/api/v1';

$endpoints = [
    'context' => '/contexts',
    'users' => '/users',
    'issues' => '/issues',
    'sections' => '/sections',
    'submissions' => '/submissions'
];

$results = [];

foreach ($endpoints as $key => $endpoint) {
    $url = $base . $endpoint;
    $json = file_get_contents($url);
    $data = json_decode($json, true);
    $results[$key] = $data['itemsMax'] ?? count($data['items'] ?? []);
}

echo json_encode($results);
