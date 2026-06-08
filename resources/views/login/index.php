<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Inloggen</title>
    <?php require_once '../components/head.php'; ?>
</head>

<body>

    <?php require_once '../components/header.php'; ?>

    <div class="container">
        
        <h2>Inloggen</h2>

        <!-- Formulier stuurt data via POST naar de loginController -->
        <form action="<?php echo $base_url; ?>/app/Http/Controllers/loginController.php" method="POST">
            
            <div class="form-group">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Inloggen</button>
        </form>

    </div>  

</body>

</html>
