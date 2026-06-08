<?php
// Start de sessie
session_start();

// Databaseverbinding en configuratie inladen
require_once '../../../config/conn.php';
require_once '../../../config/config.php';

// Inputs ophalen uit het formulier
$email = $_POST['email'];
$password = $_POST['password'];
$password_check = $_POST['password_check'];

// ---- OPDRACHT STAP 2: VALIDATIE CHECKS ----

// Check 1: Is het e-mailadres wel ingevuld en een geldig e-mailadres?
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Error: Vul een geldig e-mailadres in.");
}

// Check 2: Is het wachtwoord ingevuld? (Opdracht stap 3)
if (empty($password)) {
    die("Error: Wachtwoord mag niet leeg zijn.");
}

// Check 3: Komen de twee wachtwoorden overeen?
if ($password !== $password_check) {
    die("Error: De wachtwoorden komen niet overeen.");
}

// Check 4: Bestaat deze gebruikersnaam/e-mail al in de database?
$checkQuery = "SELECT * FROM users WHERE username = :email";
$checkStatement = $conn->prepare($checkQuery);
$checkStatement->execute([':email' => $email]);

if ($checkStatement->rowCount() > 0) {
    die("Error: Dit account bestaat al.");
}

// ---- OPDRACHT STAP 3: WACHTWOORD HASHEN ----
$hash = password_hash($password, PASSWORD_DEFAULT);

// ---- OPDRACHT STAP 4: VIJFSTAPPENPLAN INSERT-QUERY ----

// 1 & 2. Schrijf de query met placeholders
$query = "INSERT INTO users (username, password) VALUES (:email, :hash)";

// 3. Zet query om naar statement (Prepare)
$statement = $conn->prepare($query);

// 4. Voer statement uit en geef de waarden mee (Execute)
$statement->execute([
    ':email' => $email,
    ':hash'  => $hash
]);

// ---- OPDRACHT STAP 5: REDIRECT NAAR LOGINPAGINA ----
header("Location: " . $base_url . "/resources/views/login/index.php?msg=Registratie+succesvol!+Je+kunt+nu+inloggen.");
exit;
