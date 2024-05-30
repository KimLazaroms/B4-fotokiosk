<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>


    <?php 
        require_once '../../../config/conn.php';
        $select_query = "SELECT * FROM meldingen";
        $statement = $conn->prepare($select_query);
        $statement->execute();
        $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <table>
            <tr>
                <th>Atractie</th>
                <th>Capaciteit</th>
                <th>Melder</th>
                <th>type</th>
                <th>prioriteit</th>
                <th>Overige Informatie</th>
                <th>Aanpassen</th>
            </tr>
            <?php foreach ($meldingen as $melding) :?>
                <tr>
                    <td><?php echo $melding['attractie'];?></td>
                    <td><?php echo $melding['capaciteit'];?></td>
                    <td><?php echo $melding['melder'];?></td>
                    <td><?php echo $melding['type'];?></td>
                    <td><?php echo $melding['prioriteit'];?></td>
                    <td><?php echo $melding['overige_info'];?></td>
                    <td><a href = "edit.php?id=<?php echo $melding['id'];?>">aanpassen</a></td>
                <tr>
            <?php endforeach;?>
        </table>
</body> 

</html>