let map = null;

Vue.createApp({
    // Les données utiles
    data() {
        return {
            inventory: [],
        };
    },
    mounted() {
        // Initialisation de la carte après le montage de Vue
        map = new ol.Map({
            target: 'map',
            view: new ol.View({
                center: ol.proj.fromLonLat([2.35, 48.85]),
                zoom: 12
            }),
            layers: [
                // Fond de carte Cassini
                new ol.layer.Tile({
                    source: new ol.source.TileWMS({
                        url: 'https://data.geopf.fr/wms-r',
                        params: {
                            'LAYERS': 'BNF-IGNF_GEOGRAPHICALGRIDSYSTEMS.CASSINI',
                            'FORMAT': 'image/png',
                            'VERSION': '1.3.0'
                        },
                        serverType: 'geoserver',
                        transition: 0
                    })
                })
            ]
        });

        // Récupération du premier objet avec une requête fetch à index.php qui nous renvoie l'objet situé dans la base de données
        fetch('/api/objets')
        .then(function (reponseHttp) {
            // reponseHttp est un objet Response
            // parse le résulat en json (possible d'utiliser reponseHttp.text())
            return reponseHttp.json();
        })
            .then((result) => {
            this.inventory = result;
            console.table(this.inventory);
        });
    },
}).mount('#interaction');
