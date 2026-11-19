<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="assets/style/style-acceuil.css">

    <!-- Librairie OpenLayers -->
        <link rel="stylesheet" href="https://unpkg.com/ol/ol.css">
        <script src="https://unpkg.com/ol/dist/ol.js"></script>
</head>

<body>
    <header> 
        <h1> COMMUNE DE PARIS </h1>
    </header>

    <div id="inventory"> 
        <h2>INVENTAIRE</h2>
        <p> 3 chaussettes blalalablbal</p>
    </div>

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
        
        // // icone sur Paris
        // let marker = new ol.layer.Vector({
        //     source: new ol.source.Vector({
        //         features: [
        //             new ol.Feature(new ol.geom.Point(ol.proj.fromLonLat([2.35, 48.85]))),
        //             new ol.Feature(new ol.geom.Point(ol.proj.fromLonLat([-123.118, 49.247]))),
        //         ],
        //     }),
        // });

        // map.addLayer(marker);   
        </script> 
    </div>

    <footer> 
        <p> Créé par Lisa Verrier et Tibère Le Nalinec</p>
    </footer>

</body>
</html>