<?php
header('Content-Type: application/json');
include('db_connection.php');

// SQL-Abfrage, um alle Produkte abzurufen
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Den Preis als float behandeln
        $price = (float)$row['price'];
        
        // Formatierung auf zwei Dezimalstellen mit Komma
        $row['price'] = number_format($price, 2, ',', '.');
        
        // Produkt zum Array hinzufügen
        $products[] = $row;
    }
} else {
    echo json_encode(["message" => "Keine Produkte gefunden."]);
    exit; // Script beenden, falls keine Produkte gefunden
}

// Antwort zurückgeben
echo json_encode($products);

// Verbindung schließen
$conn->close();
?>
