<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$tableau = array(
    "database" => array(
    "host" => 'localhost' ,
    "user" => 'root' ,
    "password" => 'root' ,
    "dbname" => 'alloFilms'
    )
  );
  $dbconfig = $tableau['database'];
  /* Connection à la base de donnée. */
    try {
        $bdd = new PDO('mysql:host=' . $dbconfig['host'] . ';dbname=' . $dbconfig['dbname'] . ';charset=utf8', $dbconfig['user'],$dbconfig['password'],
          /*pour activer les erreurs requetes sql*/
        array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )
        );
    } catch (Exception $e){
      die('Erreur : ' . $e->getMessage());
    }
      $reponse = $bdd->prepare('SELECT * FROM users');
      $reponse->execute();


// INSERT................................................................... 

if(isset($_POST['ajout'])){ // ajout = name du bouton
  $user_username = $_POST['user_username'];
  $user_mail = $_POST['user_mail'];
  $user_password = $_POST['user_password'];
  
  $insert = $bdd->prepare('INSERT INTO users(user_username, user_mail, user_password) VALUES (:user_username, :user_mail, :user_password )');
  $insert->bindParam(":user_username", $user_username, PDO::PARAM_STR);
  $insert->bindParam(":user_mail", $user_mail, PDO::PARAM_STR);
  $insert->bindParam(":user_password", $user_password, PDO::PARAM_STR);
  $insert->execute();
  
   header('Location: inscription.php');
}
$reponse->closeCursor(); // Termine le traitement de la requête
?>

