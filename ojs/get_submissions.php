<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'ojs';
$user = 'ojs';
$pass = 'ojs@20255';

$mysqli = new mysqli($host, $user, $pass, $dbname);
if ($mysqli->connect_error) {
    die(json_encode(["success" => false, "message" => "Erreur de connexion : " . $mysqli->connect_error]));
}

// Tu peux filtrer par utilisateur ici si tu veux
$sql = "SELECT s.submission_id, s.date_submitted, s.status, s.context_id, l.setting_value AS title
        FROM submissions s
        LEFT JOIN submission_settings l ON s.submission_id = l.submission_id AND l.setting_name = 'title' AND l.locale = 'fr_FR'
        ORDER BY s.date_submitted DESC
        LIMIT 50";

$result = $mysqli->query($sql);

$submissions = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $submissions[] = $row;
    }
    echo json_encode(["success" => true, "submissions" => $submissions]);
} else {
    echo json_encode(["success" => false, "message" => "Erreur lors de l'extraction des soumissions."]);
}

$mysqli->close();
?>
