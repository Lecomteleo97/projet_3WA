<?php

$title= "Mes informations";

ob_start();
$err

//$show = $show->fetch();
?>
<form class="formUpdateUsers" action="?page=infos" method="post">
    <label for="nom">Nom</label>
    <input type="text" name="nom" require value="<?=$show['nom']?>"/>
    <label for="prenom">Prenom</label>
    <input type="text" name="prenom" require value="<?=$show['prenom']?>"/>
    <label for="login">Login</label>
    <input id="loginUpdateUsers" require type="text" name="login" value="<?=$show['login']?>"/>
    <div id="contenu-login-updateInfos"></div>
    <label for="mail">Mail</label>
    <input id="mailUpdateUsers"  require type="text" name="mail" value="<?=$show['mail']?>"/>
    <div id="contenu-mail-updateInfos"></div>
    <label for="code_postal">Code postal</label>
    <input type="text" name="code_postal" require value="<?=$show['code_postal']?>"/>
    <label for="ville">Ville</label>
    <input type="text" name="ville" require value="<?=$show['Ville']?>"/>
    <label for="mdp">Mot de passe</label>
    <input class="btn" type="submit" value="Modifier mes informations" name="submit"/>
</form>

<a class="btn" href="?page=infos&action=updatePwd">Modifier mon mot de passe</a>
<?php
if(isset($action) && $action == 'updatePwd'){
?>

<form class="form-updade-pwd" action="?page=infos&action=updatePwd" method="post">
<?=$msgValid?>
<label for="mdp">Taper vôtre <span class="bold">ancien</span> mot de passe</label>
<input type="password" name="mdp" require/>
<?=$errorMsg?>
<label for="mdp2">Taper vôtre <span class="bold">nouveau</span> mot de passe</label>
<input type="password" name="mdp2" require/>
<label for="mdp3">Retapez vôtre <span class="bold">nouveau</span> mot de passe</label>
<input type="password" name="mdp3" require/>
<?=$errorMsg2?>
<input class="btn" type="submit" name="submit" value="Modifier le mot de passe"/>
</from>
<?php
}
$content = ob_get_clean();

require './view/template.php';