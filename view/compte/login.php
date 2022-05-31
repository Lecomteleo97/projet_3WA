<?php
$title = 'login';
ob_start();

?>
<!--formulaire de connexion-->
    <h1>Déjà un compte ? Identifiez-vous !</h1>
    <?php
    if(isset($auth)) echo $auth;
    ?>
<form class="form-connexion" method="post" action="index.php?page=compte">
    <label for="name">Nom d'utilisateur : </label>
    <input type="text" name="name"/>
    <label for="pwd">Mot de passe : </label>
    <input type="password" name="pwd"/>
    <input class="btn" type="submit" name="submit" value="OK"/>
</form>
<br>

<!--formulaire d'inscription-->
<h2 class="h2-login">Sinon, pour s'inscrire c'est par ici !</h2>
<form class="form-inscription" method="post" action="index.php?page=compte">
    <input type="text" name="nom" placeholder="Nom"/>
    <input type="text" name="prenom" placeholder="Prénom"/>
    <input type="text" name="login" placeholder="Nom d'utilisateur"/>
    <input type="password" name="pwd" placeholder="Mot de passe"/>
    <input type="mail" name="mail" placeholder="Adresse mail"/>
    <input type="text" name="code_postal" placeholder="Code postal"/>
    <input type="text" name="ville" placeholder="Ville"/>
    <input type="hidden" name="compte" value="user"/>
    <input class="btn" type="submit" name="submit" value="s'inscrire"/>
</form>

<?php
$content = ob_get_clean();

require 'view/template.php';
