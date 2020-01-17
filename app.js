// On initialise la latitude et la longitude 
var lat = 42.039604;
var lon = 9.012893;
var macarte = null;
var layerGroup = null;
var fondCarte = 'http://{s}.tile.opentopomap.org/{z}/{x}/{y}.png';
var test = 0;
var id;
var urlApi = 'https://appaudio1.herokuapp.com';


    
    



function initPop() {
    var modal = document.getElementById("myModal");

    var span = document.getElementsByClassName("close")[0];



    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function showModal() {
    document.getElementById('myModal').style.display = "block";

}



// Fonction d'initialisation de la carte
function initMap() {
    macarte = L.map('map').setView([lat, lon], 8);
    var baselayers = {
             OSM: L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png'),
             ESRI: L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}'),
            OrthoRM: L.tileLayer.wms('http://{s}.tile.opentopomap.org/{z}/{x}/{y}.png')
        };baselayers.OSM.addTo(macarte);
    // L.tileLayer(fondCarte, {
    //     minZoom: 1,
    //     Zoom: 5
    // }).addTo(macarte);
    layerGroup = L.layerGroup().addTo(macarte);

    
           var Parcelbati = L.tileLayer.wms('http://mapsref.brgm.fr/wxs/refcom-brgm/refign', 
                                  {layers: 'PARVEC_BATIMENT',format: 'image/png',transparent:true});

           var Cadastre = L.tileLayer.wms('https://inspire.cadastre.gouv.fr/scpc/2B096.wms?request=GetCapabilities', 
                                  {layers: '',version: '1.3.0',format: 'image/png'});
           
           var Routes = L.tileLayer.wms('https://public.sig.rennesmetropole.fr/geoserver/ows?service=wms&version=1.3.0&request=GetCapabilities', 
                                  {layers: 'ref_rva:vgs_troncon_domanialite',format: 'image/png',transparent:true});

          var data = {"Parcelbati": Parcelbati, "Cadastre": Cadastre, "Routes": Routes};
         L.control.layers(baselayers, data, {collapsed : false}).addTo(macarte);	       
        L.control.scale().addTo(macarte);
}
window.onload = function() {
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap();
    initPop();
};






function search() {
    test = 1;
    var adress = document.getElementById('adress').value;
    const req = new XMLHttpRequest();

    req.onreadystatechange = function(event) {
        // XMLHttpRequest.DONE === 4
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                layerGroup.clearLayers();
                long = this.response.features[0].geometry.coordinates[0];
                lat = this.response.features[0].geometry.coordinates[1];
                // var square = L.shapeMarker([lat, long], {
                //     shape: "square",
                //     radius: 20
                // }).addTo(layerGroup);
                // square.closePopup();
                var marker = L.marker([lat, long], {draggable: true, opacity: 0.5 }).addTo(layerGroup);
                marker.closePopup();
                setTimeout(() => {
                    macarte.setView([lat, long], 11);
                    audioHandler(document.getElementById("adress").value);
                }, 500);



            } else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    };

    req.open('GET', 'https://api-adresse.data.gouv.fr/search/?q=' + adress, true);
    req.responseType = 'json';
    req.send(null);
}





function generate() {
    var ALPHABET = '0123456789';
    var ID_LENGTH = 8;


    var rtn = '';
    for (var i = 0; i < ID_LENGTH; i++) {
        rtn += ALPHABET.charAt(Math.floor(Math.random() * ALPHABET.length));

    }
    console.log('retour', rtn)
    var result = parseInt(rtn);
    return result;


}


