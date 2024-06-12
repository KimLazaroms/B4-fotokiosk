<?php

    $action = $_POST['action'];

    if ($action == 'create') {


        //1. Verbinding
        require_once '../../../config/conn.php';

        if (isset($_POST['date'])) {
            $date = $_POST['date'];
        
            // Check if img is set and not empty
            if (isset($_POST['img']) && !empty($_POST['img'])) {
                $img = $_POST['img'];
        
                // Prepare the SQL statement for updating the record
                $query = "INSERT INTO fotos SET date = :date, img = :img";
        
                // Prepare the statement
                $statement = $conn->prepare($query);
        
                // Execute the statement with proper placeholders
                $statement->execute([
                    ':date' => $date,
                    ':img' => $img,
                ]);
            } else {
                echo "Image is not set or empty";
                ?><a href="../../../resources/views/foto's/index.php?">GA TERUG</a><?php
            }
            $msg = "De foto is gemaakt";	
        header("location: ../../../resources/views/foto's/index.php?msg=$msg");
        }
    }

    if ($action == 'update') {

        $date = $_POST['date'];
        if(empty($date)){
            $errors[] = "date is verplicht";
        }
        $img = $_POST['img'];
        if(empty($img)){
            $errors[] = "foto is verplicht";
        }

        $id = $_POST['id'];

        if(isset($errors)){
            // var_dump($errors);
            foreach($errors as $error){
                echo $error . '<br>';
            }
            ?><a href="../../../resources/views/foto's/edit.php?id=<?php echo $id;?>">GA TERUG</a><?php
            die();
        }
    
        require_once '../../../config/conn.php';
    
        $query = "UPDATE fotos SET date = :date, img = :img WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":date" => $date,
            ':img' => $img,
            ":id" => $id
        ]);
               
        $msg = "De foto is aangepast";	
        header("location: ../../../resources/views/foto's/index.php?msg=$msg");

    }
    if ($action == 'delete') {
        $id = $_POST['id'];

        //1. Verbinding
        require_once '../../../config/conn.php';
        //2. Query
        $query =  "DELETE FROM fotos WHERE id = :id";

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
