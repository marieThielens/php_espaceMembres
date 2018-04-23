<?php

include 'config.php';

$dbconfig = $tableau['database'];
/* Connection à la base de donnée. */
try {
  $bdd = new PDO('mysql:host=' . $dbconfig['host'] . ';dbname=' . $dbconfig['dbname'] . ';charset=utf8', $dbconfig['user'],$dbconfig['password'],
    /*pour activer les erreurs requetes sql*/
  array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )
  );
} 
// On traite l'erreur (ex probleme de mot de passe, php rsique d'afficher
// toute la ligne. Pour éviter ce problème :
catch (Exception $e){
  die('Erreur : ' . $e->getMessage());
}
