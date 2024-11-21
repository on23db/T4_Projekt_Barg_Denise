<?php
header('Content-Type: application/json');
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $uploadDir = 'uploads/';  // Zielverzeichnis
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    // Bild hochladen
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        // Erfolgreich hochgeladen
        echo json_encode(['success' => true, 'filename' => $uploadFile]);
    } else {
        // Fehler beim Hochladen
        echo json_encode(['success' => false, 'message' => 'Fehler beim Bild-Upload']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Keine Datei hochgeladen']);
}
?>

