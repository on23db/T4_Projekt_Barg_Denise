<?php
header('Content-Type: application/json');
include('db_connection.php');

// Eingehende POST-Daten lesen
$data = json_decode(file_get_contents("php://input"));

// Überprüfen, ob alle erforderlichen Felder vorhanden sind
if (!isset($data->sku) || !isset($data->name) || !isset($data->brand) || !isset($data->image)) {
    echo json_encode(["success" => false, "message" => "Fehlende Felder"]);
    exit;
}

// Eingehende Daten sicher machen (SQL-Injection verhindern)
$sku = $conn->real_escape_string($data->sku);
$name = $conn->real_escape_string($data->name);
$brand = $conn->real_escape_string($data->brand);
$image = $conn->real_escape_string($data->image);

// SQL-Abfrage, um das neue Produkt hinzuzufügen
$sql = "INSERT INTO products (sku, name, brand, image) VALUES ('$sku', '$name', '$brand', '$image')";

// SQL-Abfrage ausführen
if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Produkt erfolgreich hinzugefügt"]);
} else {
    echo json_encode(["success" => false, "message" => "Fehler beim Hinzufügen des Produkts: " . $conn->error]);
}

// Verbindung schließen
$conn->close();



?>