<?php
require './model/ManageProduits.php';
require './model/ManageMessages.php';

$produits = new ManageProduits();
$sendMessage = new ManageMessages();



$info_produit = $produits-> getproduitInfos($id);
$produit = $info_produit->fetch();

if(isset($_POST['submit']) && $_POST['submit']=='envoyer un message') {
    $origin_id = $sendMessage->findOriginId($produit['user_id'], $_SESSION['id']);
    $origin_id = $origin_id->fetch();
    if(!isset($origin_id['origin_id'])) $origin_id['origin_id'] = 0;
    $sendMessage->sendMesssage($_SESSION['id'], $produit['user_id'], $_POST['message'], $origin_id['origin_id'], 1);
}

require './view/produit_view.php';