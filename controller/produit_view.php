<?php
require './model/ManageProduits.php';
require './model/ManageMessages.php';

$produits = new ManageProduits();
$sendMessage = new ManageMessages();


$info_produit = $produits-> getproduitInfos($id);
$produit = $info_produit->fetch();

//gestion formulaire de l'envoi de message privé depuis la page pdt ou service view
if(isset($_POST['submit']) && $_POST['submit']=='envoyer un message') {
    
    //securisation de l'entrée message
    $msgView = htmlspecialchars(trim($_POST['message']));
    
    //cherche si déja une conversation connu avec les users 
    $origin_id = $sendMessage->findOriginId($produit['user_id'], $_SESSION['id']);
    $origin_id = $origin_id->fetch();
    
    //si oui la continuer, sinon en commencer une 
    if(!isset($origin_id['origin_id'])) $origin_id['origin_id'] = 0;
    $sendMessage->sendMesssage($_SESSION['id'], $produit['user_id'], $msgView , $origin_id['origin_id'], 1);
}


//gestion formulaire envoi de mail si user pas connecter
 if(isset($_POST['submit']) && $_POST['submit']=="envoyer un mail"){
     
     //securisation des entrées
     $sendMail = htmlspecialchars(trim($_POST['message']));
     $mail = htmlspecialchars(trim($_POST['mail']));
     
     //fonction qui envoi un mail
    $retour = mail(''.$produit['user_mail'].'', 'contact a propos de '.$produit['nom'].'', $_POST['message'], 'From: '.$_POST['mail'].'');
        if($retour)
            echo '<p>Votre message a bien été envoyé.</p>';
    }

require './view/produit_view.php';