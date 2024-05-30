<?php

    $action = $_POST['action'];

    if ($action == 'create') {
        //Variabelen vullen
        $attractie = $_POST['attractie'];
        if (empty($attractie))
        {
            $errors[] = "Het veld 'attractie' is verplicht";
        }
        $type = $_POST['type'];
        if (empty($type))
        {
            $errors[] = "Het veld 'type' is verplicht";
        }
        $capaciteit = $_POST['capaciteit'];
        if (empty($capaciteit))
        {
            $errors[] = "Het veld 'capaciteit' is verplicht";
        }
        if(isset($_POST['prioriteit']))
        {
            $prioriteit = 1;
        }
        else
        {
            $prioriteit = 0;
        }
        $melder = $_POST['melder'];
        if (empty($melder))
        {
            $errors[] = "Het veld 'melder' is verplicht";
        }
        $overig = $_POST['overig'];
        if (empty($overig))
        {
            $errors[] = "Het veld 'overig' is verplicht";
        }
        if (isset($errors))
        {
            var_dump($errors);
            die();
        }
        // echo $attractie . " / " . $capaciteit . " / " . $melder . " / " . $type . " / " . $prioriteit . " / " . $overig;

        //1. Verbinding
        require_once '../../../config/conn.php';

        //2. Query
        $query =    "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info) 
                    VALUES (:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info)";
        //3. Prepare
        $statement = $conn->prepare($query);
        //4. Execute
        $statement->execute([

            ":attractie" => $attractie,
            ":capaciteit" => $capaciteit,
            ":melder" => $melder,
            ":type" => $type,
            ":prioriteit" => $prioriteit,
            ":overige_info" => $overig
        ]);
        $msg = "De melding is verstuurd";	
        header("location: ../../../resources/views/meldingen/index.php?msg=$msg");
    }

    if ($action == 'update') {
        $id = $_POST['id'];
        $capaciteit = $_POST['capaciteit'];
        if(isset($_POST['prioriteit']))
        {
            $prioriteit = 1;
        }
        else
        {
            $prioriteit = 0;
        }
        $melder = $_POST['melder'];
        $overig = $_POST['overige_info'];


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
            ":capaciteit" => $capaciteit,
            ":prioriteit" => $prioriteit,
            ":melder" => $melder,
            ":overige_info" => $overig
        ]);
        $msg = "De melding is aangepast";	
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
        $msg = "De melding is verwijderd";	
        header("location: ../../../resources/views/meldingen/index.php?msg=$msg");

    }
?>
