<?php
// Header um CORS zu ermöglichen
header('Content-Type: application/json');  

include('db_connection.php');  

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Benutzer mit der angegebenen E-Mail finden
    $sql = "SELECT password FROM accounts WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    // Überprüfen, ob das Passwort korrekt ist
    if ($hashedPassword && password_verify($password, $hashedPassword)) {
        echo json_encode(["message" => "Login erfolgreich!"]);
        // Hier könntest du eine Session starten oder den Benutzer weiterleiten
    } else {
        echo json_encode(["message" => "Ungültige E-Mail oder Passwort."]);
    }

    $stmt->close();
    $conn->close();
}
?>