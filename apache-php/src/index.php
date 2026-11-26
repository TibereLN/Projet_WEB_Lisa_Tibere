<?php

/*Session*/
session_start();

require 'flight/autoload.php';

//Connexion à la base de données POSTGRES
include('bdd.php');

//Empêche flight de gérer les erreurs, laisse le serveur Apache/PHP le faire
Flight::set('flight.handle_errors', false);

Flight::route('/', function() {
    Flight::render('accueil');
});

Flight::route('GET /api/objets', function () {
    // Récupération du lien de connexion à la base de données POSTGRES
    $link = Flight::get('db');

    // Si un identifiant est fourni dans l'URL
    if (isset($_GET['id'])) {
        // Récupération d'un objet spécifique
        $sql = "SELECT * FROM objets WHERE id = $1";
        $query = pg_query_params($link, $sql, $_GET['id']);
    } else {
        // Récupération des objets permettant de commencer le jeu, on vas dire que c'est uniquement le premier objet
        $sql = "SELECT * FROM objets WHERE id = 1";
        $query = pg_query($link, $sql);
    }
    // Récupération des résultats
    $results = pg_fetch_all($query);
    // Envoie du résultat en format JSON
    Flight::json($results);
});

Flight::start();

?>