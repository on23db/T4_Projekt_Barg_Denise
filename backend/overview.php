<?php
header('Content-Type: application/json');
include('db_connection.php');

// Abfrage für die Gesamtzahl der Produkte
$productQuery = "SELECT COUNT(*) AS totalProducts FROM products";
$productResult = $conn->query($productQuery);
$totalProducts = $productResult->fetch_assoc()['totalProducts'] ?? 0;

// Abfrage für die Gesamtzahl der Bestellungen
$orderQuery = "SELECT COUNT(*) AS totalOrders FROM orders";
$orderResult = $conn->query($orderQuery);
$totalOrders = $orderResult->fetch_assoc()['totalOrders'] ?? 0;

// Abfrage für die Gesamtzahl der Kunden
$customerQuery = "SELECT COUNT(*) AS totalCustomers FROM accounts WHERE isAdmin = 0";
$customerResult = $conn->query($customerQuery);
$totalCustomers = $customerResult->fetch_assoc()['totalCustomers'] ?? 0;

// JSON-Antwort senden
echo json_encode([
    "success" => true,
    "totalProducts" => $totalProducts,
    "totalOrders" => $totalOrders,
    "totalCustomers" => $totalCustomers
]);

// Verbindung schließen
$conn->close();
?>
