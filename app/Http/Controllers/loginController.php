<?php
// Start of haak aan op de sessie
session_start();

// Databaseverbinding inladen
require_once '../../../config/conn.php';
require_once '../../../config/config.php';

// Haal gebruikersnaam en wachtwoord op uit het formulier
$username = $_POST['username'];
$password = $_POST['password'];

// Schrijf de SELECT-query met placeholders voor de tabel 'users'
$query = "SELECT * FROM users WHERE username = :username";
$statement = $conn->prepare($query);
$statement->execute([
    ':username' => $username
]);

// Haal de gegevens op met fetch() omdat we exact één user verwachten
$user = $statement->fetch(PDO::FETCH_ASSOC);

// Controleer of het account bestaat (rowCount kleiner dan 1)
if ($statement->rowCount() < 1) {
    die("Error: account bestaat niet");
}

// Controleer of het ingevulde wachtwoord klopt met de hash uit de database
if (!password_verify($password, $user['password'])) {
    die("Error: wachtwoord niet juist!");
}

// Alle checks geslaagd! Sla het user-id op in de sessie
$_SESSION['user_id'] = $user['id'];

// Stuur de gebruiker terug naar de hoofdpagina van de storingapp
header("Location: " . $base_url . "/index.php");
exit;
