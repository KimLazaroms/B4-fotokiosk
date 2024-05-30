<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>Fotokiosk-B4 / Foto's / Nieuw</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="POST">
            <input type="hidden" name="action" value="create">

            <div class="form-group">
                <label for="attractie">Foto:</label>
                <input type="..." name="foto" id="foto" class="form-input">
            </div>
            <input type="submit" value="Verstuur melding">

        </form>
    </div>

</body>

</html>
