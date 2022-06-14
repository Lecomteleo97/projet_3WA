<?php
require_once './model/ManageCompte.php';
$users = new ManageCompte();



//fonction deconnexion
if(isset($_GET['deconnex'])){
    unset($_SESSION);
    session_destroy();
}


//traitement formulaire inscription
if(isset($_POST['btsubmit']) && $_POST['btsubmit']=='S\'inscrire'){
   
    //verification par token
   if($users->verifyToken($_POST['token'])){
       
         //sécurisation des entrées
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $login = htmlspecialchars(trim($_POST['login']));
        $pwd = htmlspecialchars(trim($_POST['pwd']));
        $mail = htmlspecialchars(trim($_POST['mail']));
        $codePostal = htmlspecialchars(trim($_POST['code_postal']));
        $ville = htmlspecialchars(trim($_POST['ville']));
    
        //appel a la db et cryptage du mdp en PASSWORD_BCRYPT et recuperation du dernier id en db
        $registre = $users ->insertAccount($nom,$prenom,$login, password_hash( $pwd , PASSWORD_BCRYPT ) ,$mail,$codePostal,$ville);
        }    
        //la session prend la valeur du formulaire pour connecter direct a la page compte apres inscription
        $_SESSION['Auth']= 'user';
        $_SESSION['name']=$login;
        $_SESSION['id']=intval($registre);
        $auth = '<h2>Merci de vous être enregistré !</h2>';
    }else{
        $auth = '';
}
$token = $users->setToken();


//traitement du formullaire connexion
if(isset($_POST['submit']) && $_POST['submit']=='OK'){
    
    //sécurisation des entrées
    $login = htmlspecialchars(trim($_POST['name']));
    $pwd = htmlspecialchars(trim($_POST['pwd']));
    
    // recup user qui a le nom saisi dans le formulaire
    //verifie si nom et mdp connu
    $liste_user = $users -> getAccount($login);
    
    //fait un tableau du resultat
    $result = $liste_user->fetchAll(PDO::FETCH_ASSOC);
    
    //nb a une valeur si il y a un resultat 
    $nb = count($result);
    
    //si connu ok
    if ($nb && password_verify( $pwd, $result[0]['mdp'] )){
        $_SESSION['Auth']= $result[0]['type_compte'];
        $_SESSION['name']=$result[0]['login'];
        $_SESSION['id']=$result[0]['id'];
        $_SESSION['prenom']=$result[0]['prenom'];
        
    }else{
        $auth = '<h2>indentifiants incorrect !</h2>';
    }
}

//renvoi au formulaire si pas authentifier 
if(!isset($_SESSION['Auth']) || !$_SESSION['Auth']){
    require './view/compte/login.php';
    
}else{//sinon renvoi a la page de gestion du compte
    require './view/compte/compte.php';
}





// fetchAll
/*
Si le fetchAll a plusieurs resultats :
[
    [ 'id' => 1, 'name' => 'Leo'],
    [ 'id' => 1, 'name' => 'Leo']
]
Si le fetchAll a un seul resultat :
[
    [ 'id' => 1, 'name' => 'Leo']
]

*/

// fetch
/*
Il faut etre sur de ne recup une seule et unique ligne en DB

[ 'id' => 1, 'name' => 'Leo']
 
*/