<?php
// Verbindung zur Datenbank herstellen
require_once 'db_connection.php';

header("Content-Type: application/json");

try {
    // Eingabedaten auslesen
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['sku'], $input['name'], $input['brand'], $input['price'])) {
        throw new Exception("Ungültige Eingabedaten");
    }

    // Variablen zuweisen
    $sku = $input['sku'];
    $name = $input['name'];
    $brand = $input['brand'];
    $price = $input['price'];

    // Update-Query ausführen
    $query = "UPDATE products SET name = ?, brand = ?, price = ? WHERE sku = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssds", $name, $brand, $price, $sku);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Produkt erfolgreich aktualisiert."]);
    } else {
        throw new Exception("Fehler beim Aktualisieren des Produkts.");
    }
} catch (Exception $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}

$conn->close();
?>
