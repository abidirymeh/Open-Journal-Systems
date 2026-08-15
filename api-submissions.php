<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'ojs';
$user = 'ojs';
$pass = 'ojs@20255';

$mysqli = new mysqli($host, $user, $pass, $dbname);
if ($mysqli->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Erreur de connexion à la base de données']);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

$userId = $mysqli->real_escape_string($data['userId'] ?? '');
$token = $mysqli->real_escape_string($data['token'] ?? '');

if (empty($userId) || empty($token)) {
    echo json_encode(['success' => false, 'message' => 'Données manquantes']);
    exit;
}

// Vérification de l'utilisateur et du token
$userCheck = $mysqli->query("SELECT * FROM users WHERE user_id = '$userId' AND remember_token = '$token'");
if ($userCheck->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'Utilisateur non trouvé ou token invalide']);
    exit;
}

// Récupération des soumissions liées à l'utilisateur
$sql = "SELECT 
            submission_id AS id,
            date_submitted AS dateSubmitted,
            status
        FROM submissions
        WHERE context_id = '$userId' 
        ORDER BY date_submitted DESC
        LIMIT 20";

$result = $mysqli->query($sql);

if (!$result) {
    echo json_encode(['success' => false, 'message' => 'Erreur SQL: ' . $mysqli->error]);
    exit;
}

$submissions = [];

while ($row = $result->fetch_assoc()) {
    $submissions[] = [
        'id' => (int)$row['id'],
        'dateSubmitted' => $row['dateSubmitted'],
        'statusLabel' => getStatusLabel($row['status']),
        // Tu peux ajouter ici la récupération des publications si tu veux
    ];
}

echo json_encode([
    'success' => true,
    'itemsMax' => count($submissions),
    'items' => $submissions,
]);

$mysqli->close();

// Fonction pour convertir le code status en label lisible
function getStatusLabel($status) {
    $labels = [
        1 => 'En cours',
        2 => 'Soumis',
        3 => 'Accepté',
        4 => 'Rejeté',
        // Ajoute ici les statuts spécifiques à ta base
    ];
    return $labels[$status] ?? 'Inconnu';
}
?>
