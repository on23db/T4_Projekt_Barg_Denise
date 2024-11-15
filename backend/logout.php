<?php
session_start();

// Sitzung zerstören, um den Benutzer auszuloggen
session_unset(); 
session_destroy(); 

// Setzt das Session-Cookie auf ein abgelaufenes Datum, um es zu löschen
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"]
    );
}

// JSON-Antwort zurückgeben
echo json_encode(["message" => "Logout erfolgreich!"]);
?>
