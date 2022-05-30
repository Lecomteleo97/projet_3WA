<?php
//je recup la classe parente
require_once 'model/Manage.php';

class ManageProduits extends Manage {
    
    public function getProduitsList(?string $limit=''):object {
       if($limit) $limit = ' LIMIT '.$limit;
       $query = "SELECT produits.*, photos.nom AS photo, users.ville AS ville FROM produits JOIN photos ON photos.produit_id = produits.id JOIN users ON users.id = produits.user_id WHERE type = 'produit legume' OR type = 'produit fruit' ORDER BY produit_id DESC".$limit;
       return $this->getQuery($query);
    }
    
    public function getServicesList(?string $limit=''):object {
       if($limit) $limit = ' LIMIT '.$limit;
       $query = "SELECT produits.*, photos.nom AS photo, users.ville AS ville FROM produits JOIN photos ON photos.produit_id = produits.id JOIN users ON users.id = produits.user_id WHERE type = 'service' ORDER BY produit_id DESC".$limit;
       return $this->getQuery($query);
    }
    
    public function getProduitInfos($id){
    return $this->getQuery("SELECT produits.*, photos.nom AS photo, users.ville AS ville, users.nom AS user_name, users.prenom AS user_prenom FROM produits JOIN photos ON photos.produit_id = produits.id JOIN users ON users.id = produits.user_id WHERE produits.id='".$id."'");
}
}