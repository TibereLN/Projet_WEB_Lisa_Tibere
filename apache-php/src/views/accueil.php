<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Librairie OpenLayers -->
    <link rel="stylesheet" href="https://unpkg.com/ol/ol.css">
    <script src="https://unpkg.com/ol/dist/ol.js"></script>
    <!-- Librairie Vue  -->
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <!-- CSS perso  -->
    <link rel="stylesheet" href="assets/style/style-acceuil.css">

    <title>COMMUNE DE PARIS</title>
</head>

<body>
    <header> 
        <h1> COMMUNE DE PARIS </h1>
    </header>

    <div id="interaction">

        <div id="inventory"> 
            <h2>INVENTAIRE</h2>
            <ul>
                <!-- inventory = variable liste située dans acceuil.js  -->
                <li v-for="item in inventory" :key="item.id">
                    {{item.nom}}
                </li>
            </ul>
        </div>
        <div id=map></div>
    </div>

    <footer> 
        <p> Créé par Lisa Verrier et Tibère Le Nalinec</p>
    </footer>

    <!-- Notre fichier js  -->
    <script src="/assets/js/accueil.js"></script>
</body>
</html>

