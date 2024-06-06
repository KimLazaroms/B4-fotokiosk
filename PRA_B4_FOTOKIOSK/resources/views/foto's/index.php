<?php require_once __DIR__.'/../../../config/config.php'; ?>


<head>
    <title>Fotokiosk-B4 / Foto's</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>


    <?php
// Include your database connection file
require_once '../../../config/conn.php';

// Check if the ID parameter is set
if(isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $imageId = $_GET['id'];
    $imageId = filter_var($imageId, FILTER_SANITIZE_NUMBER_INT);

    // Prepare and execute a SELECT query to fetch image details based on the ID
    $select_query = "SELECT * FROM b4_fotokiosk WHERE id = :id";
    $statement = $conn->prepare($select_query);
    $statement->bindParam(':id', $imageId);
    $statement->execute();
    
    // Fetch the image details
    $imageDetails = $statement->fetch(PDO::FETCH_ASSOC);

    // Check if image details were found
    if($imageDetails) {
        // Return the image details as JSON
        echo json_encode($imageDetails);
    } else {
        // Return an error message if image details were not found
        echo json_encode(array('error' => 'Image not found'));
    }
} else {
    // Return an error message if ID parameter is not set
    echo json_encode(array('error' => 'ID parameter is missing'));
}
?>



    <div id="imageContainer">
        <!-- Images will be displayed here -->
    </div>

    <script>
    // Function to display a specific image based on its ID
    function displayImageById(imageId) {
        // Perform AJAX request to fetch image details based on ID
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_image_details.php?id=' + imageId, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var imageData = JSON.parse(xhr.responseText);
                if (imageData && !imageData.error) {
                    var imageURL = "http://localhost/path/to/images/" + imageData.filename; // Adjust the URL as per your file structure
                    document.getElementById("imageContainer").innerHTML = '<img src="' + imageURL + '" alt="Image">';
                } else {
                    console.log("Error: " + imageData.error);
                }
            }
        };
        xhr.send();
    }

    // Call the function to display a specific image when the page loads
    window.onload = function() {
        // Example: Display image with ID 1
        displayImageById(1);
    };
</script>S




    <!-- <div class="container">
        <h1>Foto's</h1>
        <a href="create.php">Nieuwe foto &gt;</a> -->

        <!-- <?php if(isset($_GET['msg']))
        // {
        //     echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        // } ?> -->


    <!-- <?php 
        // require_once '../../../config/conn.php';
        // $select_query = "SELECT * FROM meldingen";
        // $statement = $conn->prepare($select_query);
        // $statement->execute();
        // $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?> -->
</body> 

</html>