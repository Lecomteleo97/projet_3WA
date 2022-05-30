<?php
require_once './model/ManageCompte.php';
$users = new ManageCompte();


//fonction deconnexion
if(isset($_GET['deconnex'])){
    unset($_SESSION);
    session_destroy();
}

//traitement du formullaire connexion
if(isset($_POST['submit']) && $_POST['submit']=='OK'){
    
    //verifie si nom et mdp connu
    $liste_user = $users -> getAccount($_POST['name'], md5($_POST['pwd']));
    
    //fait un tableau du resultat
    $result = $liste_user->fetchAll(PDO::FETCH_ASSOC);
    
    //nb a une valeur si il y a un resultat 
    $nb = count($result);
    if ($nb){
        $auth = '<h2>Identification reussi</h2>';
        $_SESSION['Auth']= $result[0]['type_compte'];
        $_SESSION['name']=$result[0]['login'];
        $_SESSION['id']=$result[0]['id'];
        $_SESSION['prenom']=$result[0]['prenom'];
        
    }else{
        $auth = '<h2>indentif incorrect !</h2>';
    }
}

//traitement formulaire inscription
if(isset($_POST['submit']) && $_POST['submit']=='s\'inscrire'){
    
    //verification du bon remplissage des champs
    if($_POST['nom']=='' || $_POST['prenom']=='' || $_POST['login']=='' || $_POST['pwd']=='' || $_POST['mail']==''|| $_POST['code_postal']==''
    || $_POST['ville']==''){
        $auth =  '<h2>Veuillez remplir tous les champs !</h2>';
    }else{
    //appel a la db
    $registre = $users ->insertAccount($_POST['nom'],$_POST['prenom'],$_POST['login'],md5($_POST['pwd']),$_POST['mail'],$_POST['code_postal'],$_POST['ville'],$_POST['compte']);
    
    //les session prennent la valeur du formulaire pour connecter direct a la page compte apres inscription
    $_SESSION['Auth']=$_POST['compte'];
    $_SESSION['name']=$_POST['login'];
    $auth = '<h2>Merci de vous être enregistré !</h2>';
}
}
else{
$auth = '';
}


//renvoi au formulaire si pas authentifier 
if(!isset($_SESSION['Auth']) || !$_SESSION['Auth']){
    require './view/compte/login.php';
    
}else{//sinon renvoi a la page de gestion du compte
    require './view/compte/compte.php';
    var_dump($_SESSION);
}