<?php

require_once './model/ManageProduits.php';

$produits = new ManageProduits();



$list_produits = $produits-> getProduitsList();

require './view/produits.php';