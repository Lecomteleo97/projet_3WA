<?php
session_start();
$page = '';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

if(isset($_GET['action'])){
    $action = $_GET['action'];
}



switch($page){
    
    case 'services' :
        require './controller/services.php';
        break;
        
    case 'service_view' :
        require './controller/service_view.php';
        break;
        
    case 'contact' :
        require './controller/contact.php';
        break;
        
    case 'produits' :
        require './controller/produits.php';
        break;
        
    case 'produit_view' :
        require './controller/produit_view.php';
        break;
        
    case 'compte' :
        require './controller/compte.php';
        break;
        
    case 'annonces' :
        require './controller/annonces.php';
        break;
        
    case 'messages' :
        require './controller/messages.php';
        break;     
        
    default : 
        require './controller/home.php';
}