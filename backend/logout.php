<?php
session_start();
session_unset(); // Alle Session-Variablen löschen
session_destroy(); // Die Session zerstören

echo json_encode(["status" => "logged_out"]);
?>
