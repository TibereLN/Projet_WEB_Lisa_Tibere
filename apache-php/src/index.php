<?php

/*Session*/
session_start();

require 'flight/autoload.php';

include('bdd.php');



//Empêche flight de gérer les erreurs, laisse le serveur Apache/PHP le faire
Flight::set('flight.handle_errors', false);

Flight::route('/', function() {
    Flight::render('accueil');
});

Flight::route('/mysql', function() {
    Flight::render('accueil');
});

Flight::route('GET /objets', function () {
    $link = Flight::get('db');
    
    if (isset($_GET['id'])) {
        $sql = "SELECT * FROM objets WHERE id = " . $_GET['id'];
        $query = pg_query($link, $sql);
        $results = pg_fetch_all($query);
        Flight::json($results);
    }
    else {
        $sql = "SELECT * FROM objets";
        $query = pg_query($link, $sql);
        $results = pg_fetch_all($query);
        Flight::json($results);
    }    
});

Flight::start();

?>