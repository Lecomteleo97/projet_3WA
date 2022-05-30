<?php

require './model/ManageProduits.php';

$produits = new ManageProduits();

$info_produit = $produits-> getproduitInfos($id);

require './view/service_view.php';