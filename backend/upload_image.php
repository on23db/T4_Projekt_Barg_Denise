<?php
header('Content-Type: application/json');
include('db_connection.php');

// Absoluter Pfad zum Upload-Verzeichnis (öffentlich zugänglich)
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';

// Prüfen, ob das Verzeichnis existiert und wenn nicht, erstellen
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Prüfen, ob eine Datei hochgeladen wurde
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image = $_FILES['image'];
    $sku = $_POST['sku'];

    // Ermitteln der Dateiendung
    $fileExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

    // Überprüfen des Dateityps
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo json_encode(['success' => false, 'message' => 'Nur Bilddateien sind erlaubt.']);
        exit;
    }

    // Erstellen eines neuen Dateinamens
    $newFileName = $sku . '_' . time() . '.' . $fileExtension;
    $uploadPath = $uploadDir . $newFileName;

    // Überprüfen, ob das Verzeichnis schreibbar ist
    if (!is_writable($uploadDir)) {
        echo json_encode(['success' => false, 'message' => 'Das Upload-Verzeichnis ist nicht beschreibbar.']);
        exit;
    }

    // Datei verschieben
    if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
        echo json_encode(['success' => true, 'fileName' => $newFileName]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Fehler beim Hochladen der Datei.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Kein Bild hochgeladen oder Fehler beim Upload.']);
}
?>
