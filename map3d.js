var lat = document.getElementById("lat").innerText;
console.log(lat);
var long = document.getElementById("long").innerText;
var map3d = L.Wrld.map("map3d", "bd3ac4b9f2cefddef2ece298845b35fc", {
    center: [lat, long],
    zoom: 16
});
//var marker3d = marker([lat, long], { title: "My marker" }).addTo(map3d);

var _mouseDownPoint = null;

map3d.on("mousedown", onMouseDown);
map3d.on("mouseup", onMouseUp);

function onMouseDown(event) {
    _mouseDownPoint = event.layerPoint;
}

function onMouseUp(event) {
    _mouseUpPoint = event.layerPoint;
}