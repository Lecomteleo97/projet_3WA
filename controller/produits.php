<?php

require_once './model/ManageProduits.php';

$produits = new ManageProduits();

switch($page){
    case 'produits' :
    $list_produits = $produits-> getProduitsList();   
    break;
    
    case 'services' :
    $list_produits = $produits-> getServicesList();
    break;
}



require './view/produits.php';