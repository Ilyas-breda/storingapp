<?php 
// Start de sessie als deze nog niet actief is
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Laad de configuratie met $base_url
require_once 'config/config.php'; 
?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp</title>
    <?php require_once 'resources/views/components/head.php'; ?>
</head>

<body>

    <?php require_once 'resources/views/components/header.php'; ?>

    <div class="container home">

        <h1>Welkom bij de technische dienst</h1>
        <img src="public_html/img/logo-big-fill-only.png" alt="logo">

    </div>

</body>

</html>
