<?php
include 'db_connection.php';
header("Content-Type: application/json");

try {
    if (!isset($_GET['sku'])) {
        throw new Exception("Keine SKU angegeben.");
    }

    $sku = $_GET['sku'];

    // Delete-Query ausführen
    $query = "DELETE FROM products WHERE sku = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $sku);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(["success" => true, "message" => "Produkt erfolgreich gelöscht."]);
        } else {
            throw new Exception("Kein Produkt mit der angegebenen SKU gefunden.");
        }
    } else {
        throw new Exception("Fehler beim Löschen des Produkts.");
    }
} catch (Exception $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}

$conn->close();
?>
