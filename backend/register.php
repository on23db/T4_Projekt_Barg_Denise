<?php
header('Content-Type: application/json');
require('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    // Überprüfen, ob die E-Mail bereits existiert
    $sql = "SELECT email FROM accounts WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // E-Mail existiert bereits
        echo json_encode(["message" => "Diese E-Mail-Adresse ist bereits registriert."]);
        $stmt->close();
        $conn->close();
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Benutzer in die Datenbank einfügen
    $insertSql = "INSERT INTO accounts (email, password, firstname, lastname) VALUES (?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("ssss", $email, $hashedPassword, $firstname, $lastname);
    
    if ($insertStmt->execute()) {
        session_start(); 
        $_SESSION['email'] = $email;  
        $_SESSION['firstname'] = $firstname; 
        $_SESSION['lastname'] = $lastname; 

        echo json_encode(["message" => "Registrierung erfolgreich!"]);
    } else {
        echo json_encode(["message" => "Fehler bei der Registrierung."]);
    }

    $insertStmt->close();
    $conn->close();
}
?>
