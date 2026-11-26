
var map = new ol.Map({
    target: 'map',

    view: new ol.View({
        center: ol.proj.fromLonLat([2.35, 48.85]),
        zoom: 12
    }),

    layers: [
        // Choix du fond de carte
        new ol.layer.Tile({
            source: new ol.source.TileWMS({
                url: 'https://data.geopf.fr/wms-r/wms',
                params: {
                    'LAYERS': 'BNF-IGNF_GEOGRAPHICALGRIDSYSTEMS.CASSINI',
                    'FORMAT': 'image/png',
                    'VERSION': '1.3.0',
                    'TILED': true
                },
                serverType: 'geoserver',
                transition: 0
            })
        })
    ]
});

//--------------------------------------------------- Affichage des points ---------------------------------------------------------

// Lien vers la base de donnée du geoserver
let urlPoints = 'http://localhost:8080/geoserver/objets/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=objets%3Apoints&outputFormat=application%2Fjson&maxFeatures=50';

var points = new ol.layer.Vector({
    source: new ol.source.Vector({
        url: urlPoints,
        format: new ol.format.GeoJSON(),
    }),
});
map.addLayer(points);


