<?php

    $action = $_POST['action'];

    if ($action == 'create') {
        //Variabelen vullen
        $... = $_POST['...'];
        if (empty($...))
        {
            $errors[] = "Het veld '...' is verplicht";
        }
        if (isset($errors))
        {
            var_dump($errors);
            die();
        }

        //1. Verbinding
        require_once '../../../config/conn.php';

        //2. Query
        $query =    "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info) 
                    VALUES (:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info)";
        //3. Prepare
        $statement = $conn->prepare($query);
        //4. Execute
        $statement->execute([

        ]);
        $msg = "De foto is verstuurd";	
        header("location: ../../../resources/views/meldingen/index.php?msg=$msg");
    }

    if ($action == 'update') {
        $id = $_POST['id'];


        //1. Verbinding
        require_once '../../../config/conn.php';

        //2. Query
        $query =    "UPDATE meldingen 
                    SET capaciteit = :capaciteit, prioriteit = :prioriteit, melder = :melder, overige_info = :overige_info
                    WHERE id = :id";
        //3. Prepare
        $statement = $conn->prepare($query);
        //4. Execute
        $statement->execute([
            ":id" => $id,
        ]);
        $msg = "De foto is aangepast";	
        header("location: ../../../resources/views/meldingen/index.php?msg=$msg");

    }
    if ($action == 'delete') {
        $id = $_POST['id'];

        //1. Verbinding
        require_once '../../../config/conn.php';
        //2. Query
        $query =  "DELETE FROM meldingen WHERE id = :id";

        //3. Prepare
        $statement = $conn->prepare($query);
        //4. Execute
        $statement->execute([
        ":id" => $id,
        ]);
        $msg = "De foto is verwijderd";	
        header("location: ../../../resources/views/meldingen/index.php?msg=$msg");

    }
?>
