<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__.'/../../../config/config.php'; 
?>

<header>
    <div class="container">
        <nav>
            <img src="<?php echo $base_url; ?>/public_html/img/logo-big-v4.png" alt="logo" class="logo">
            <a href="<?php echo $base_url; ?>/index.php">Home</a> |
            <a href="<?php echo $base_url; ?>/resources/views/meldingen/index.php">Meldingen</a>
        </nav>
        <div>
            <?php if(isset($_SESSION['user_id'])): ?>
                <!-- Zichtbaar als je bent ingelogd -->
                <a href="<?php echo $base_url; ?>/app/Http/Controllers/logoutController.php">Uitloggen</a>
            <?php else: ?>
                <!-- Zichtbaar als je NIET bent ingelogd (Opdracht stap 6) -->
                <a href="<?php echo $base_url; ?>/register.php">Registreren</a> |
                <a href="<?php echo $base_url; ?>/resources/views/login/index.php">Inloggen</a>
            <?php endif; ?>
        </div>
    </div>
</header>
