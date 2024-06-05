<!doctype html>
<html lang="nl">

<head>
    <title>Fotokiosk-B4 / Foto's / Aanpassen</title>
    <?php require_once '../components/head.php'; ?>
</head>

<body>
    <?php 

    if(!isset($_GET['id'])){
        echo "Geef in je aanpaslink op de index.php het id van betreffende item mee achter de URL in je a-element om deze pagina werkend te krijgen na invoer van je vijfstappenplan";
        exit;

    }
    ?>
    <?php
        require_once '../components/header.php'; ?>

    <div class="container">
        <h1>Melding aanpassen</h1>

        <?php
        //Haal het id uit de URL:
        $id = $_GET['id'];

        //1. Haal de verbinding erbij
        require_once '../../../config/conn.php';


        //2. Query, vul deze aan met een WHERE zodat je alleen de melding met dit id ophaalt
        $select_query = "SELECT * FROM meldingen WHERE id = :id ";

        //3. Van query naar statement
        $statement = $conn->prepare($select_query);

        //4. Voer de query uit, voeg hier nog de placeholder toe
        $statement->execute([
            'id' => $id
        ]);

        //5. Ophalen gegevens, tip: gebruik hier fetch().
        $melding = $statement->fetch(PDO::FETCH_ASSOC);
        ?>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php"method="POST">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $melding ['id'];?>">
            <!-- (voeg hier opdracht 7 toe) -->

            <div class="form-group">
                <label>Foto:</label>
                <?php echo $...['...']; ?>
            </div>            
            <input type="submit" value="Melding opslaan">

        </form>

        <hr>


        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php"method="POST">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $melding ['id'];?>">
            <input type="submit" value="verwijderen">
        </form>

            
    </div>  

</body>

</html>
