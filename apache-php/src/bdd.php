<?php

/*Connexion à la base de données*/
$host = 'db';
$port = 5432;
$dbname = 'mydb';
$user = 'postgres';
$pass = 'postgres';

// Connexion BDD
$link = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");

if (!$link) {
    die('Erreur de connexion');
} else {
    echo 'Connexion BDD fonctionne !';
}
Flight::set('db', $link);

?>