<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Fotokiosk-B4 / Foto's</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    

    <?php 
        require_once '../../../config/conn.php';
        $select_query = "SELECT * FROM fotos";
        $statement = $conn->prepare($select_query);
        $statement->execute();
        $fotos = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <table>
            <tr>
                <th>Datum</th>
                <th>Foto</th>
                <th>Aanpassen</th>
            </tr>
        <?php foreach ($fotos as $foto) :?>
            <td><?php echo $foto['date'];?></td>
            <td>
                <img src="<?php echo $base_url . $foto['img']; ?>" alt="">    
            </td>
            <td>
                <a href="edit.php?id=<?php echo $foto['id'];?>">
                    aanpassen
                </a>
            </td>
        <?php endforeach; ?>
        </table>
    </div>
</body> 
</html>
