<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Nieuw</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>
    
    <script>
document.getElementById('meldingForm').addEventListener('submit', function(e) {
    // Haal waarden op
    const attractie = document.getElementById('attractie').value.trim();
    const type = document.getElementById('type').value;
    const melder = document.getElementById('melder').value.trim();

    // Controleer of verplichte velden leeg zijn
    if (!attractie || !type || !melder) {
        alert("Vul Attractie, Type en Melder in.");
        e.preventDefault(); // voorkomt dat het formulier wordt verzonden
        return false;
    }
});
</script>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">

    <div class="form-group">
        <label for="attractie">Naam attractie:</label>
        <input type="text" name="attractie" id="attractie" class="form-input">
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <select name="type" id="type" class="form-input" required>
            <option value="">-- Kies een type --</option>
            <option value="achtbaan">Achtbaan</option>
            <option value="draaimolen">Draaimolen</option>
            <option value="waterattractie">Waterattractie</option>
            <option value="overig">Overig</option>
        </select>
    </div>

    <div class="form-group">
        <label for="capaciteit">Capaciteit p/uur:</label>
        <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input">
    </div>

    <div class="form-group">
        <label for="melder">Naam melder:</label>
        <input type="text" name="melder" id="melder" class="form-input">
    </div>

    <div class="form-group">
        <label>
            <input type="checkbox" name="prioriteit" value="1"> Prioriteit
        </label>
    </div>

    <div class="form-group">
        <label for="overige_info">Overige info:</label>
        <textarea name="overige_info" id="overige_info" class="form-input" rows="4" cols="50" placeholder="Typ hier extra informatie..."></textarea>
    </div>

    <input type="submit" value="Verstuur melding">

</form>
    </div>

</body>

</html>
