<?php
header('Content-Type: application/json');  // Setzt den Header für JSON

include('db_connection.php');  // Deine Datenbankverbindung einbinden

// Überprüfen, ob die Verbindung tatsächlich noch geöffnet ist
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage, um alle Produkte abzurufen
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    // Daten in ein Array umwandeln
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo json_encode(["message" => "Keine Produkte gefunden."]);
}

// Antwort zurückgeben
echo json_encode($products);

// Verbindung schließen
$conn->close();
?>
