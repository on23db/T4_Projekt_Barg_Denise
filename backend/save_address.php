<?php
session_start();
include('db_connection.php'); 
header('Content-Type: application/json');

// Prüfen, ob der Nutzer eingeloggt ist
if (!isset($_SESSION['email'])) {
    echo json_encode(['success' => false, 'message' => 'Nicht eingeloggt.']);
    exit;
}

// Prüfen, ob die Anfrage ein POST-Request ist
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Ungültige Anfrage.']);
    exit;
}

// Nutzerdaten aus der Anfrage abrufen
$data = json_decode(file_get_contents("php://input"), true);
if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Keine Daten übermittelt.']);
    exit;
}

// Nutzer-Email aus der Session
$email = $_SESSION['email'];

// Nutzer-ID abrufen
$sql = "SELECT id FROM accounts WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo json_encode(['success' => false, 'message' => 'Nutzer nicht gefunden.']);
    exit;
}

$userId = $user['id'];

// Prüfen, ob die Adresse existiert
$checkSql = "SELECT id FROM addresses WHERE account_id = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("i", $userId);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    // Adresse aktualisieren
    $updateSql = "
        UPDATE addresses 
        SET street = ?, house_number = ?, city = ?, postal_code = ?, country = ?
        WHERE account_id = ?
    ";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param(
        "sssssi",
        $data['street'],
        $data['house_number'],
        $data['city'],
        $data['postal_code'],
        $data['country'],
        $userId
    );

    if ($updateStmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Adresse aktualisiert.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Fehler beim Aktualisieren der Adresse.']);
    }
} else {
    // Neue Adresse einfügen
    $insertSql = "
        INSERT INTO addresses (account_id, street, house_number, city, postal_code, country) 
        VALUES (?, ?, ?, ?, ?, ?)
    ";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param(
        "isssss",
        $userId,
        $data['street'],
        $data['house_number'],
        $data['city'],
        $data['postal_code'],
        $data['country']
    );

    if ($insertStmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Adresse hinzugefügt.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Fehler beim Hinzufügen der Adresse.']);
    }
}

$checkStmt->close();
$conn->close();
?>
