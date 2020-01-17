<?php
    $long = $_POST['long'];
    $lat = $_POST["lat"];
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.1/leaflet.css" rel="stylesheet" />
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://cdn-webgl.wrld3d.com/wrldjs/dist/latest/wrld.js"></script> 

    <title>Urban'Isula</title>
</head>

<body>
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h4 class="title is-4">Pas sûr que ça marche</h4>        
        </div>
    </div>

    </div>
    <div class="columns is-gapless">
        <div class="column is-one-third" id="noMap">
            <img src="images/urbanIsulaLogo.jpg" alt="Logo Urban Isula" />
            <div class="explanation">
                <h5 class="title is-5">Visualisation 3D</h5>
                <br>
                <span id="lat" name="lat" style="display: none;"><?php echo floatval($lat) ?></span>
                <span id="long" name="long" style="display: none;"><?php echo floatval($long) ?></span>
            </div>

            <div class="form">
                <div class="vocal">
                    <button class="button is-primary is-rounded">
                        <span class="icon is-large">
                            <i class="fas fa-map"></i>
                        </span>
                        <a href="index.php">2D</a>
                    </button>
                </div>
                <br>
                <div class="vocal">
                    <button class="button is-primary is-rounded">Download</button>
                </div>
            </div>
            
        </div>
        <div class="column is-two-third" id="map3d"></div>
    </div>
</body>
<script src="map3d.js"></script>
</html>