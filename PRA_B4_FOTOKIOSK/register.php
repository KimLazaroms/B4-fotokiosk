<!doctype html>
<html lang="nl">

<head>
    <title>Fotokiosk-B4</title>
    <?php require_once 'resources/views/components/head.php'; ?>
</head>

<body >
        
    <?php require_once 'resources/views/components/header.php'; ?>

    <div class="container home">
    <div class="wrapper">
        <h2>Welkom op de registreer pagina</h2>
        <form action="<?php echo $base_url; ?>/app/Http/Controllers/registreren.php" method="POST">
            <input type="hidden" name="action" value="register">
            <div class="form-group">
                <label for="naam">Naam:</label>
                <input type="text" name="naam" id="naam">
            </div>
            <div class="form-group">
                <label for="achternaam">Achternaam:</label>
                <input type="text" name="achternaam" id="achternaam">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="button">
                <input type="submit" value="Registeren">
            </div>
        </form>
    </div>
    </div>

    <footer class="Footer">
<?php
require_once('footer.php');
?>
</footer>
        <!-- footer -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>

</html>