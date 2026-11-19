<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
        <!-- Librairie OpenLayers -->
    <link rel="stylesheet" href="https://unpkg.com/ol/ol.css">
    <script src="https://unpkg.com/ol/dist/ol.js"></script>
    
    <!-- Librairie Turf -->
    <script src='https://unpkg.com/@turf/turf@6/turf.min.js'></script>
    <style>
        #map {
            height: 500px;
        }
    </style>
</head>

<body>
    <p>Hello World :P</p>
    <div id=map>
    <script> 
    var map = new ol.Map({
        target: 'map',
        view: new ol.View({
            center: ol.proj.fromLonLat([2.35, 48.85]), // attention, OpenLayers par défaut en 3857
            zoom: 13,
        }),
        layers: [ new ol.layer.Tile({
            source: new ol.source.XYZ({
                url: 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            }),
        }),
        ],
    });
    
    // icone sur Paris
    let marker = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: [
                new ol.Feature(new ol.geom.Point(ol.proj.fromLonLat([2.35, 48.85]))),
                new ol.Feature(new ol.geom.Point(ol.proj.fromLonLat([-123.118, 49.247]))),
            ],
        }),
    });

    map.addLayer(marker);
    
    var pointP = turf.point([2.35, 48.85]);
    var pointV = turf.point([-123.118, 49.247]);
    var tLine = turf.greatCircle(pointP, pointV).geometry.coordinates;

    console.log(tLine);

    map.addLayer(line);
    </script> 


</body>
</html>