<?php
require_once './model/ManageMessages.php';
$message = new ManageMessages();

if(isset($_GET['idconv'])){
    $idConv = $_GET['idconv'];
}else{
  $idConv = 0;
}   


$listeMessagesOrigin = $message->showMessagesOrigin($_SESSION['id']);


$affNameDest = $message->showDestMessageSend($_SESSION['id']);

if(isset($_POST['submit']) && $_POST['submit']=='envoyer message'){
    $sendMessage = $message->sendMesssage($_POST['exp_id'],$_POST['dest_id'],$_POST['message'],$_POST['origin_id'],$_POST['lu_pas_lu']);
}
require './view/compte/messages.php';