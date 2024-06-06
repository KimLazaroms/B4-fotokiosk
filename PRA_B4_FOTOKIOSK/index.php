<!doctype html>
<html lang="nl">

<head>
    <title>Fotokiosk-B4</title>
    <?php require_once 'resources/views/components/head.php'; ?>
</head>

<body>

    <?php require_once 'resources/views/components/header.php'; ?>

    <div class="container home">
        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>
        <div class="box">
        <h1>Welkom bij de fotokiosk!</h1>

                <div class="Rrow">
                    <div class="InfoBox">
                        <p>Onze Park</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero placeat dolor nemo adipisci, officia nobis, fugit aut quibusdam fugiat fuga rerum repellat rem vero iste natus pariatur, labore et sequi.</p>
                    </div>
                <img src="public_html/img/logo-big-fill-only.png" alt="logo">
            </div>

            <div class="Lrow">
                <div class="ImgPadding">
                    <img src="public_html/img/attractie.png" alt="attractie">
                </div>
                <div class="InfoBox">
                    <p>Leuke Attracties:</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione asperiores nemo saepe corrupti laboriosam? Quam laborum magnam ullam nihil nulla aperiam nostrum tenetur necessitatibus consequatur iste, vitae dolorem optio. Suscipit!</p>
                </div>
            </div>

        </div>

    </div>
    <!-- //check 2 -->

</body>

</html>
