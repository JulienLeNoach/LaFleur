<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'phpmyadmin');
define('DB_PASSWORD', '12345');
define('DB_NAME', 'baselafleur2');

// Connexion à la base de données MySQL 
$bdd = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if ($bdd === false) {
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
