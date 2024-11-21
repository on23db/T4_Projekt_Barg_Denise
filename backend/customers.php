<?php
header("Content-Type: application/json");
include 'db_connection.php';

try {
    $query = "SELECT 
                accounts.id, 
                accounts.firstname, 
                accounts.lastname,
                accounts.email, 
                addresses.street, 
                addresses.house_number, 
                addresses.city, 
                addresses.postal_code, 
                addresses.country
            FROM accounts
            LEFT JOIN addresses ON accounts.id = addresses.account_id
            WHERE accounts.isAdmin = 0
    ";

    // Führe die Abfrage aus
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Daten abrufen und in ein Array umwandeln
        $customers = [];
        while($row = $result->fetch_assoc()) {
            $customers[] = $row;
        }

        // Gebe die Daten als JSON aus
        echo json_encode($customers);
    } else {
        // Falls keine Daten gefunden wurden
        echo json_encode([]);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Fehler beim Abrufen der Kundendaten: " . $e->getMessage()]);
}

// Schließe die Verbindung
$conn->close();
?>
