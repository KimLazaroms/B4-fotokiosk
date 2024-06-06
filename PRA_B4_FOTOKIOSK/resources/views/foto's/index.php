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
            var daysOfWeek = ["Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag"];
            var imageContainer = document.getElementById("imageContainer");
            var imagePath = dayOfWeek + "_" + daysOfWeek[dayOfWeek] + "/";
            var numImages = 0; // Set to 0 initially
            
            // Define number of images based on the day of the week
            switch(dayOfWeek) {
                case 0: // Sunday
                    numImages = 3; // Change accordingly
                    break;
                case 1: // Monday
                    numImages = 4; // Change accordingly
                    break;
                case 2: // Tuesday
                    numImages = 5; // Change accordingly
                    break;
                case 3: // Wednesday
                    numImages = 6; // Change accordingly
                    break;
                case 4: // Thursday
                    numImages = 7; // Change accordingly
                    break;
                case 5: // Friday
                    numImages = 8; // Change accordingly
                    break;
                case 6: // Saturday
                    numImages = 9; // Change accordingly
                    break;
            }

            var imagesHTML = "";

            // Loop to create HTML for each image
            for (var i = 1; i <= numImages; i++) {
                var imageURL = imagePath + i + ".jpg";
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