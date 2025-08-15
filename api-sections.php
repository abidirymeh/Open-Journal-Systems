<?php
// Désactiver tous les avertissements affichés dans la sortie (qui cassent le JSON)
ini_set('display_errors', 0);
error_reporting(0);

header('Content-Type: application/json; charset=utf-8');

// Connexion à la base de données
$host = 'localhost';
$dbname = 'ojs';
$user = 'ojs';
$pass = 'ojs@20255';

$mysqli = new mysqli($host, $user, $pass, $dbname);
if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Erreur de connexion à la base de données']);
    exit;
}

// Requête SQL
$query = "
    SELECT section_id AS id, abbrev, title, policy, meta_indexed, meta_reviewed, abstracts_not_required 
    FROM sections 
    ORDER BY seq ASC
";

$result = $mysqli->query($query);

if (!$result) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Erreur SQL : ' . $mysqli->error]);
    exit;
}

$sections = [];

while ($row = $result->fetch_assoc()) {
    $sections[] = [
        'id' => (int)$row['id'],
        'abbrev' => json_decode($row['abbrev'], true) ?? $row['abbrev'],
        'title' => json_decode($row['title'], true) ?? $row['title'],
        'policy' => json_decode($row['policy'], true) ?? $row['policy'],
        'metaIndexed' => (bool)$row['meta_indexed'],
        'metaReviewed' => (bool)$row['meta_reviewed'],
        'abstractsNotRequired' => (bool)$row['abstracts_not_required'],
    ];
}

// Réponse JSON finale
echo json_encode([
    'success' => true,
    'itemsMax' => count($sections),
    'items' => $sections,
], JSON_UNESCAPED_UNICODE);

$mysqli->close();
