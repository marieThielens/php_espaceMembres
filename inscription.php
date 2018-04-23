<?php include "include/header.php"; 
      include "core/request.php"; ?>

<h1 class="center">Page de contact</h1>

<!-- ................................... Créer un compte........................... -->
<p id="pInscrire">S'inscrire</p>
<form  id="formInscription" action="" method="post">  

  <fieldset id="parentInput">
    <input class="input" type="text" name="user_username" placeholder="Nom" required>
    <input class="input" type="email" name="user_mail" placeholder="Courriel" required>
    <input class="input" type="password" name="user_password" placeholder="Mot de passe" required>

    <button class="btn btn-sm" id="boutonAjout" name="ajout" value="add" type="submit">Créer un compte</button>
</fieldset>

</form>

<!-- .....................................Se connecter...............................-->
<div id="login">
    <p>Se connecter</p>

        <form name='form-login' action="" method="post">
        <fieldset>
            Pseudo: <input type="text" name="user_username" placeholder="pseudo">
            Mot de passe:  <input type="password" name="user_password" placeholder="Mot de passe">
            <input type="checkbox" name="" id="" value="connection">
            <label for="">Connection automatique</label>
            <button type="submit" name="connection">Se connecter</button>
        </fieldset>
        </form>

<!-- ....................................Se désinscrire...................................-->
<div id="delete">
    <p>Se désinscrire</p>
    <fieldset>
        <form action="" method="post">
            <input type="mail" name="user_username" placeholder="Votre mail">
            <button name="delete">Se désinscrire</button>
        </form>
    </fieldset>


</div>

<?php include("include/footer.php"); ?>
