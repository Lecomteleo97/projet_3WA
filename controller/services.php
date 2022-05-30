<?php
require_once './model/ManageProduits.php';

$produits = new ManageProduits();

$list_services = $produits-> getServicesList();

require './view/services.php';