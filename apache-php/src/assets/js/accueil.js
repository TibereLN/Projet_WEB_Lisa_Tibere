
var map = new ol.Map({
    target: 'map',

    view: new ol.View({
        center: ol.proj.fromLonLat([2.35, 48.85]),
        zoom: 12
    }),

    layers: [
        new ol.layer.Tile({
            source: new ol.source.TileWMS({
                url: 'https://data.geopf.fr/wms-r/wms',
                // Choix du fond de carte
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
    // Mise en place du style des pts
    style: new ol.style.Style({
        image: new ol.style.Icon({
            src: '/assets/image/canon.png',
            scale: 0.1,
        }),
    }),
});
map.addLayer(points);
