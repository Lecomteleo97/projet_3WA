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
    <input required pattern="^[A-Za-z '-]+$" maxlength="20" type="text" name="name"/>
    <label for="pwd">Mot de passe : </label>
    <input required type="password" name="pwd"/>
    <input class="btn" type="submit" name="submit" value="OK"/>
</form>
<br>

<!--formulaire d'inscription--
--securiser avec required et pattern-->

<h2 class="h2-login">Sinon, pour s'inscrire c'est par ici !</h2>
<form class="form-inscription" method="post" action="index.php?page=compte">
    <input type="text" required pattern="^[A-Za-z '-]+$" maxlength="20" name="nom" placeholder="Nom"/>
    <input type="text" required pattern="^[A-Za-z '-]+$" maxlength="20" name="prenom" placeholder="Prénom"/>
    <input type="text" required name="login" placeholder="Nom d'utilisateur"/>
    <input type="password" required name="pwd" placeholder="Mot de passe"/>
    <input type="email" required pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z.]{2,15}" name="mail" placeholder="Adresse mail"/>
    <input type="text" required pattern="[0-9]{5}" name="code_postal" placeholder="Code postal"/>
    <input type="text" required pattern="^[A-Za-z '-]+$" name="ville" placeholder="Ville"/>
    <input class="btn" type="submit" name="submit" value="s'inscrire"/>
</form>

<?php
$content = ob_get_clean();

require 'view/template.php';
