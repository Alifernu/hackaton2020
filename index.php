
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="app.js"></script>
  
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
                <h5 id="titrefont" class="title is-5">Visualisation 2D</h5>
                <br>
            </div>
            <div class="search">
                <input class="input" id="adress" type="text" placeholder="Recherche"/>
                <button class="button is-primary" onclick="search()">Recherche</button>
            </div>
            <br>
            <div class="form">
                <form  method="post" action="index3d.php">
                    <div id="lat" name="lat" style="display: none"></div>
                    <div id="long" name="long" style="display: none"></div>
                    <div class="vocal">
                    <!-- <button class="button is-primary is-rounded" > -->
   
                        <input class="button is-primary is-rounded " type="submit" value="3D">
  
                        <!-- <span class="icon is-large"> -->
                            <!-- <i class="fas fa-map"></i> -->
                        <!-- </span> -->
                    <!-- </button> -->
                    </div>
                </form>
                <br>
                <div class="vocal">
                    <button class="button is-primary is-rounded">Download</button>
                </div>
            </div>
        </div>

        <div class="column is-two-third">
            <div id="map"></div>
        </div>
    </div>
</body>

</html>
