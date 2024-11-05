<?php
$servername = "localhost";
$username = "root"; // Standardbenutzername in XAMPP
$password = "";     // Standardpasswort ist leer
$dbname = "database"; // Name der Datenbank

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung prüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
echo "Erfolgreich mit der Datenbank verbunden!";
$conn->close();
?>
