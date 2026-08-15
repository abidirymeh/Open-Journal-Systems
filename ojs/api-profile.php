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

// 🔽 AJOUTE les colonnes que tu veux retourner ici :
$sql = "SELECT user_id, username, email, email_private_1, email_private_2 
        FROM users 
        WHERE user_id = '$userId' AND remember_token = '$token' LIMIT 1";

$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode([
        'success' => true,
        'userId' => $user['user_id'],
        'username' => $user['username'],
        'email' => $user['email'],
        'email_private_1' => $user['email_private_1'],
        'email_private_2' => $user['email_private_2']
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Utilisateur non trouvé ou token invalide']);
}

$mysqli->close();
?>
