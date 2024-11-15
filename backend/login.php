<?php
header('Content-Type: application/json');
require('db_connection.php');

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
        session_start(); // Starte die benutzerdefinierte Session
        $_SESSION['email'] = $email;  // Speichert die E-Mail in der Session
        echo json_encode(["message" => "Login erfolgreich!"]);
    } else {
        echo json_encode(["message" => "Ungültige E-Mail oder Passwort."]);
    }

    $stmt->close();
    $conn->close();
}
?>
