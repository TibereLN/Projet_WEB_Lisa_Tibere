
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
