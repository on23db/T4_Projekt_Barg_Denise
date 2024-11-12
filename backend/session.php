<?php
// Startet die Session (wenn noch nicht gestartet)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Überprüft, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['email'])) {
    // Wenn nicht eingeloggt, leite zur Login-Seite weiter
    header("Location: Home.vue");
    exit;
}
?>
