<?php require_once __DIR__.'/../../../config/config.php'; ?>

<header>
    <div class="container">
        <nav>
            <img src="<?php echo $base_url; ?>/public_html/img/logo-big-v4.png" alt="logo" class="logo">
            <a href="<?php echo $base_url; ?>/index.php">Home</a> |
            <a href="<?php echo $base_url; ?>/resources/views/foto's/index.php">Foto's</a>
        </nav>
        <div>
            <a href="<?php echo $base_url; ?>/login.php">Inloggen</a>
            <a href="<?php echo $base_url; ?>/register.php">Registreren</a>
            <a href="<?php echo $base_url; ?>/logout.php">Uitloggen</a>
        </div>
    </div>
</header>
