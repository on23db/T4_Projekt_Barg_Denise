<?php
session_start();
include('db_connection.php'); 
header('Content-Type: application/json');

if (!isset($_SESSION['email'])) {
    echo json_encode(['success' => false, 'message' => 'Nicht eingeloggt.']);
    exit;
}

$email = $_SESSION['email'];

$sql = "SELECT isAdmin, firstname, lastname FROM accounts WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email); 

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $user_info = $result->fetch_assoc();

    if ($user_info) {
        echo json_encode([
            'success' => true,
            'isAdmin' => $user_info['isAdmin'],
            'firstname' => $user_info['firstname'],
            'lastname' => $user_info['lastname'],
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
