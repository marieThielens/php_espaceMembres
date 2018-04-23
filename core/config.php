<?php
/* Fonction pour débugger. Ex : débugger la variable result => debug($result)*/
function dd($variable){
  echo '<pre>';
  var_dump($variable);
  echo '</pre>';
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$tableau = array(
    "database" => array(
    "host" => 'localhost' ,
    "user" => 'root' ,
    "password" => 'root' ,
    "dbname" => 'espaceMembresPhp'
    )
  );

  ?>