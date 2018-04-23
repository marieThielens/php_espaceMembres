<?php 
include 'core/connect.php';
include './include/fonctions.php';

$user_username = $_SESSION['user_username'];

if(isset($_POST['minichat']) && isset($_SESSION['user_username'])&& isset($_POST['user_message'])){

        //$user_username = traite_chaine($_POST['user_username']);
        $user_message = traite_chaine($_POST['user_message']);

        //$user_message = htmlentities(strip_tags(trim($_POST['user_message'])),ENT_QUOTES);

        // Insertion du message à l'aide d'une requête préparée
        $req = $bdd->prepare('INSERT INTO user (user_username, user_message) VALUES(:user_username, :user_message)');
        $req->execute(array(
         'user_username' => $user_username,
         'user_message' => $user_message
        ));
        
        // Redirection du visiteur vers la page du minichat
        header('Location: minichat.php');

}


?>