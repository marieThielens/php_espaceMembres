# Site php espace membre qui donne accès à une page de chat

- Un site sur lequel on peut s'inscrire, se connecter, se déconnecter et se désinscrire.
- Quand l'utilisateur est connecté une session est ouverte et l'utilisateur est redirigé vers une page de chat avec ses messages
- L'utilisateur ne peut pas rentrer dans le chat sans s'être connecté.

- la page minichat.php contient le formulaire permettant d'ajouter un message et liste les 10 derniers messages.
- insère le message reçu avec $_POST dans la base de données puis redirige versminichat.php.

## Structurer ses fichiers

dans le dossier core se trouve :

- config.php : la carte d'identité de la db(nom de la db, mot de passe etc).
- connect.php : include 'config.php'; La connexion à la base de donnée.
- request.php : include 'connect.php'; Les requêtes à la base de donnée.
- deconnexion.php : la page qui clore la session et les cookies

### différence entre include et require

- require : inclut le contenu d'un autre fichier appelé, et provoque une erreur bloquante s'il est indisponible.
- include : inclut le contenu d'un autre fichier appelé, mais ne provoque pas d'erreur bloquante s'il est indisponible

## Protection des inputs

dans l'html mettre des required

C'est dans le fichier fonctions.php `include './include/fonctions.php';`

```PHP
function traite_chaine($chaine){
    $sortie = htmlentities(strip_tags(trim($chaine)),ENT_QUOTES);
    return $sortie;
}
```

- htmlentities : Convertit tous les caractères éligibles en entités HTML

```PHP
<?php
$str = 'Un \'apostrophe\' en <strong>gras</strong>';
 
// Affiche : Un 'apostrophe' en &lt;strong&gt;gras&lt;/strong&gt;
echo htmlentities($str);
 
// Affiche : Un &#039;apostrophe&#039; en &lt;strong&gt;gras&lt;/strong&gt;
echo htmlentities($str, ENT_QUOTES);
?>
```

- htmlspecialchars : Convertit les caractères spéciaux en entités HTML. &" (et commercial) devient "&amp;"
- strip_tags : Supprime les balises HTML et PHP d'une chaîne
- trim : Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
- ENT_QUOTES : Convertit les guillemets doubles et les guillemets simples.

## Sessions

Le support des sessions vous permet de stocker des données entre les requêtes dans le tableau super-globale $_SESSION.

Chaque visiteur accédant à votre page web se voit assigner un identifiant unique, appelé "identifiant de session". Il peut être stocké soit dans un cookie, soit propagé dans l'URL.

Dans le header :

 ```PHP
    <?php
session_start();

if (isset($_SESSION['user_id']) AND isset($_SESSION['user_username']))
{
    echo 'Bonjour ' . $_SESSION['user_username'];
}
?>
```

Déconnexion de la session :

```PHP
    session_start();

// Détruit toutes les variables de session
$_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également
// le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalement, on détruit la session.
session_destroy();
    header('location: ../inscription.php');
    echo 'Vous êtes déconnecté';

```

### Passer l'identifiant de session (session ID)

Il y a deux méthodes de propagation de l'identifiant de session :

- Cookies
- Par URL

Le module de session supporte les deux méthodes. Les cookies sont optimaux, mais comme ils ne sont pas sûrs (tous les internautes ne les acceptent pas), ils ne sont pas fiables.
