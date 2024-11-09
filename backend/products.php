<?php
// Header um CORS zu ermöglichen
header('Content-Type: application/json');  

include('db_connection.php');  

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
