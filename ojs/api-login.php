<?php
$host = 'localhost';
$dbname = 'ojs';
$user = 'ojs';
$pass = 'ojs@20255';

$mysqli = new mysqli($host, $user, $pass, $dbname);
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

$data = json_decode(file_get_contents("php://input"));

$email = $mysqli->real_escape_string($data->email ?? '');
$password = $data->password ?? '';

$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // Si tu as un champ token ou api_key, le retourner ici, sinon juste succès
        echo json_encode([
            'success' => true,
            'userId' => $user['user_id'],
            'username' => $user['username'],
            'remember_token' => $user['remember_token'] // si tu as ce champ
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Mot de passe incorrect']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Utilisateur non trouvé']);
}

$mysqli->close();
?>
