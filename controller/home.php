<?php
require_once './model/ManageProduits.php';

$produits = new ManageProduits();

$list_produits = $produits-> getProduitsList(4);

$list_services = $produits-> getServicesList(4);

require './view/home.php';