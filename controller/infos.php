<?php

require './model/ManageInfos.php';
$infos = new ManageInfos();


//traitement formulaire modification d'info user
if(isset($_POST['submit']) && $_POST['submit']=='Modifier mes informations'){
    $update = $infos->updateInfos($_SESSION['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['code_postal'], $_POST['ville'], $_POST['login']);
}


//affiche les info du user
$show = $infos->showInfosUser($_SESSION['id']);
$show = $show->fetch();
var_dump($show['mdp']);

$errorMsg = '';
$errorMsg2 = '';
$msgValid = '';
//traitement formulaire de modification de pwd
if(isset($_POST['submit']) && $_POST['submit'] == 'Modifier le mot de passe'){
   $pwd = $_POST['mdp'];
    if(password_verify($pwd, $show['mdp'])==false){
        $errorMsg = '<p>mauvais mot de passe</p> '; 
    }else{
        if($_POST['mdp2'] == $_POST['mdp3']){
            $newPwd = password_hash($_POST['mdp3'], PASSWORD_BCRYPT);
            $updatePwd = $infos->updadePassword($_SESSION['id'], $newPwd);
            $msgValid = '<p class="red">Mot de passe à été modifié</p>';
        }else{
            $errorMsg2 = '<p class="red">Vos mots de passes sont différent</p>';
        }
    }
}
require './view/compte/infos.php';