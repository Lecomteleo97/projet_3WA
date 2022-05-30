<?php
ob_start();
?>
<!--formulaire de connexion-->
    <h1>Vous avez un compte ? identifiez vous !</h1>
    <?php
    if(isset($auth)) echo $auth;
    ?>
<form method="post" action="index.php?page=compte">
    <label for="name">Nom : </label>
    <input type="text" name="name"/>
    <label for="pwd">Password </label>
    <input type="password" name="pwd"/>
    <input type="submit" name="submit" value="OK">
</form>
<br>

<!--formulaire d'inscription-->
<h2>Sinon, pour s'inscrire c'est par ici !</h2>
<form method="post" action="index.php?page=compte">
    <label>S'inscrire</label>
    <label for="nom">Nom : </label>
    <input type="text" name="nom"/>
     <label for="prenom">Prénom : </label>
    <input type="text" name="prenom"/>
    <label for="login">Nom d'utilisateur </label>
    <input type="text" name="login"/>
    <label for="pwd">Password </label>
    <input type="password" name="pwd"/>
    <label for="mail">Mail </label>
    <input type="mail" name="mail"/>
    <label for="code_postal">Code postal </label>
    <input type="text" name="code_postal"/>
    <label for="ville">Ville </label>
    <input type="text" name="ville"/>
    <input type="hidden" name="compte" value="user"/>
    
    <input type="submit" name="submit" value="s'inscrire">
</form>

<?php
$content = ob_get_clean();

require 'view/template.php';
