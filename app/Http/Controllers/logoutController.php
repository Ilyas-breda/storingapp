<?php
session_start();

// Laad config voor de $base_url redirect
require_once '../../../config/config.php';

// Vernietig de sessie om de gebruiker uit te loggen
session_destroy();

// Stuur de gebruiker terug naar de indexpagina in de hoofdmap
header("Location: " . $base_url . "/index.php");
exit;
