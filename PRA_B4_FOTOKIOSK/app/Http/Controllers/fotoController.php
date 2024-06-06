<?php

    $action = $_POST['action'];

    if ($action == 'create') {

        //1. Verbinding
        require_once '../../../config/conn.php';

        //2. Query
        //3. Prepare
        //4. Execute
    }

    if ($action == 'update') {
        $id = $_POST['id'];


        //1. Verbinding
        require_once '../../../config/conn.php';

        //2. Query
        //3. Prepare
        //4. Execute        header("location: ../../../resources/views/meldingen/index.php?msg=$msg");

    }
    if ($action == 'delete') {
        $id = $_POST['id'];

        //1. Verbinding
        require_once '../../../config/conn.php';
        //2. Query
        $query =  "DELETE FROM foto's WHERE id = :id";

        //3. Prepare
        $statement = $conn->prepare($query);
        //4. Execute
        $statement->execute([
        ":id" => $id,
        ]);
        $msg = "De foto is verwijderd";	
        header("location: ../../../resources/views/foto's/index.php?msg=$msg");

    }
?>
