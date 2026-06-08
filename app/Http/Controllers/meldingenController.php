<?php
// Start de sessie als deze nog niet actief is
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ---- BEVEILIGING ----
// Controleer of de gebruiker NIET is ingelogd
if (!isset($_SESSION['user_id'])) {
    // Laad config voor de juiste $base_url
    require_once '../../../config/config.php';
    header("Location: " . $base_url . "/resources/views/login/index.php");
    exit;
}

// ---- CONTROLLER LOGICA ----

// Variabelen vullen uit het formulier
$attractie  = $_POST['attractie'];
$type       = $_POST['type'];
$capaciteit = $_POST['capaciteit'];
$melder     = $_POST['melder'];

// 1. Verbinding maken met de database
require_once '../../../config/conn.php';
require_once '../../../config/config.php';

// 2. Query schrijven (Gecorrigeerd: haakje sluiten toegevoegd en placeholder naam gelijkgetrokken)
$query = "INSERT INTO meldingen (attractie, type, melder, capaciteit)
          VALUES (:attractie, :type, :melder, :capaciteit)";

// 3. Prepare (Zet query om naar statement)
$statement = $conn->prepare($query);

// 4. Execute (Gecorrigeerd: puntkomma toegevoegd aan het einde)
$statement->execute([
    ":attractie"  => $attractie,
    ":type"       => $type,
    ":melder"     => $melder,
    ":capaciteit" => $capaciteit
]);

// Stuur de gebruiker na het opslaan netjes terug naar het meldingenoverzicht
header("Location: " . $base_url . "/resources/views/meldingen/index.php?msg=Melding+succesvol+toegevoegd");
exit;
