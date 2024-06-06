<!doctype html>
<html lang="nl">

<head>
    <title>Fotokiosk-B4</title>
    <?php require_once 'resources/views/components/head.php'; ?>
</head>

<body>

    <?php require_once 'resources/views/components/header.php'; ?>

    <div class="container home">
        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <h1>Welkom bij de technische dienst</h1>
        <img src="public_html/img/logo-big-fill-only.png" alt="logo">

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/loginController.php" method="POST">
                <input type="hidden" name="action" value="login">
        <div class="form-group">                 
            <label for="username">Username</label>                 
            <input type="text" name="username" id="username" class="form-input">             
        </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-input">
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" class="form-input">
            </div>
            <input type="submit" value="Verstuur melding">

        </form>




    </div>

</body>

</html>
