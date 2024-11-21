<?php
session_start();
include('db_connection.php'); 
header('Content-Type: application/json');

// Prüfen, ob der Nutzer eingeloggt ist
if (!isset($_SESSION['email'])) {
    echo json_encode(['success' => false, 'message' => 'Nicht eingeloggt.']);
    exit;
}

// Nutzer-Email aus der Session
$email = $_SESSION['email'];

// Nutzer-ID abrufen
$sql = "SELECT id FROM accounts WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $userId = $user['id'];

        // Adresse abrufen
        $addressSql = "SELECT street, house_number, city, postal_code, country FROM addresses WHERE account_id = ?";
        $addressStmt = $conn->prepare($addressSql);
        $addressStmt->bind_param("i", $userId);
        $addressStmt->execute();
        $addressResult = $addressStmt->get_result();
        $address = $addressResult->fetch_assoc();

        echo json_encode([
            'success' => true,
            'address' => $address // Kann NULL sein, falls keine Adresse vorhanden
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Nutzer nicht gefunden.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Datenbankfehler: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
