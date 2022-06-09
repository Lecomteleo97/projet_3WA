<?php

require_once 'model/Manage.php';

class ManageAdmin extends Manage {
    
    //affichage de toutes les annonces
    public function showAllAnnonces(){
        $query = "SELECT produits.id AS product_id, produits.nom AS prod_name ,produits.quantite ,produits.description ,produits.type ,produits.date , users.nom, users.prenom, users.ville FROM produits JOIN users ON users.id = produits.user_id";
        return $this->getQuery($query);
    }
    
    
    //suppression de l'annonce choisi 
    public function deleteAnnonceAdmin($id){
    $data=['id'=>$id];
        $query ="DELETE FROM produits WHERE id=:id";
        $this->getQuery($query, $data);
        
        //je supprime la photo dans le dossier
        $folder="./public/image/produits/";
        $nom = 'produit_'.intval($_GET['delete']).'.jpg';
                    if(file_exists($folder.$nom)){
                        unlink($folder.$nom);
                    }
    }
    
    //recuperation tous les messages
    public function showAllMessages(){
    $query= "SELECT messages.message,messages.id AS message_id, messages.origin_id, messages.exp_id, messages.dest_id, users.nom, users.prenom FROM `messages` JOIN users ON users.id = messages.exp_id ORDER BY messages.origin_id";
    return $this->getQuery($query);
    }
    
    //recupere le nom du destinataire
    public function showNameDest($user_id){
        //juste a chercher le nom par le id de user
        $data=['user_id'=>$user_id];
        $query="SELECT nom, prenom FROM users WHERE id = :user_id";
        return $this->getQuery($query, $data);
    }
    
    //delete le message
    public function deleteMessageAdmin($message_id){
        $data=['id'=>$message_id];
        $query="DELETE FROM messages WHERE id = :id";
        $this->getQuery($query, $data);
    }
    
    
    public function showAllUsers(){
        $query="SELECT * FROM users";
        return $this->getQuery($query);
    }
    
    public function deleteUserAdmin($user_id){
        $data=['id'=>$user_id];
        $query="DELETE FROM users WHERE id = :id";
        $this->getQuery($query, $data);
    }
    
    
    
    
    
}