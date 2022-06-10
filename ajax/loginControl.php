<?php

require '../model/ManageCompte.php';

$user = new ManageCompte();

//verifie si pas de login deja existant
if(isset($_POST['login'])){
$liste_user = $user -> getAccount($_POST['login']);
echo $liste_user->rowCount();
}

if(isset($_POST['mail'])){
$liste_mail = $user->findEmail($_POST['mail'])  ;
echo $liste_mail->rowCount();
}