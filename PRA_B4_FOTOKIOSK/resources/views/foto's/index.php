<?php require_once __DIR__.'/../../../config/config.php'; ?>


<head>
    <title>Fotokiosk-B4 / Foto's</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <!DOCTYPE html>




    <div id="imageContainer">
        <!-- Images will be displayed here -->
    </div>

    <script>
    // Function to display images based on the current day of the week
    function displayDailyImages() {
        var today = new Date();
        var dayOfWeek = today.getDay(); // 0 (Sunday) to 6 (Saturday)
        var imageContainer = document.getElementById("imageContainer");
        var numImages = 0; // Set to 0 initially
        
        // Define the image path
        var imagePath = "";

        // Define number of images based on the day of the week
        switch(dayOfWeek) {
            case 0: // Sunday
                imagePath = "http://localhost/pra/blokB/B4-fotokiosk/PRA_B4_FOTOKIOSK/resources/views/img/0_Zondag/";
                numImages = 902; // Change accordingly
                break;
            case 1: // Monday
                imagePath = "http://localhost/pra/blokB/B4-fotokiosk/PRA_B4_FOTOKIOSK/resources/views/img/1_Maandag/";
                numImages = 924; // Change accordingly
                break;
            case 2: // Tuesday
                imagePath = "http://localhost/pra/blokB/B4-fotokiosk/PRA_B4_FOTOKIOSK/resources/views/img/2_Dinsdag/";
                numImages = 922; // Change accordingly
                break;
            case 3: // Wednesday
                imagePath = "http://localhost/pra/blokB/B4-fotokiosk/PRA_B4_FOTOKIOSK/resources/views/img/3_Woensdag/";
                numImages = 918; // Change accordingly
                break;
            case 4: // Thursday
                imagePath = "http://localhost/pra/blokB/B4-fotokiosk/PRA_B4_FOTOKIOSK/resources/views/img/4_Donderdag/";
                numImages = 5; // Change accordingly
                break;
            case 5: // Friday
                imagePath = "http://localhost/pra/blokB/B4-fotokiosk/PRA_B4_FOTOKIOSK/resources/views/img/5_Vrijdag/";
                numImages = 906; // Change accordingly
                break;
            case 6: // Saturday
                imagePath = "http://localhost/pra/blokB/B4-fotokiosk/PRA_B4_FOTOKIOSK/resources/views/img/6_Zaterdag/";
                numImages = 914; // Change accordingly
                break;
        }

        var imagesHTML = "";

        // Loop to create HTML for each image
        for (var i = 1; i <= numImages; i++) {
            var imageURL = imagePath + "image_" + i + ".jpg"; // Change this line to match your naming convention
            console.log(imageURL);
            imagesHTML += '<img src="' + imageURL + '" alt="Image ' + i + '">';
        }

        // Display the images in the container
        imageContainer.innerHTML = imagesHTML;
    }

    // Call the function to display daily images when the page loads
    window.onload = displayDailyImages;
</script>




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