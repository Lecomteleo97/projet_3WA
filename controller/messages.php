<?php
require_once './model/ManageMessages.php';
$message = new ManageMessages();

//defini id de conversat
if(isset($_GET['idconv'])){
    $idConv = $_GET['idconv'];
}else{
  $idConv = 0;
}   

//affichege de la liste des conversation
$listeMessagesOrigin = $message->showMessagesOrigin($_SESSION['id']);

//affiche les nom des conv
$affNameDest = $message->showDestMessageSend($_SESSION['id']);

//traitement du formulaire d'envoi de message
if(isset($_POST['submit']) && $_POST['submit']=='envoyer message'){
    
    //securisation des entrées messages
     $msg = htmlspecialchars(trim($_POST['message']));
    
    //envoi du message en db
    $sendMessage = $message->sendMesssage($_POST['exp_id'],$_POST['dest_id'],$msg,$_POST['origin_id'],$_POST['lu_pas_lu']);
}
require './view/compte/messages.php';