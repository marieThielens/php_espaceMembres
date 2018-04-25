<?php
include "include/header.php"; 
include "minichat_post.php"; 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>

    
    <form action="" method="post"><!-- action = minichta_post.php-->
        <p>
        <label for="message">Message</label> :  <input type="text" name="user_message" id="message" required/><br />

        <input type="submit" name="minichat" value="Envoyer" />
	</p>
    </form>

<div>

 <a href="core/deconnexion.php">Déconnexion</a> 
</div>

<?php

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT user_username, user_message FROM user ORDER BY user_id DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['user_username']) . '</strong> : ' . htmlspecialchars($donnees['user_message']) . '</p>';
}

$reponse->closeCursor();

?>
    </body>
</html>