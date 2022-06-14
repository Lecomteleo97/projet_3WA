<?php

require_once 'model/Manage.php';

class ManageAnnonces extends Manage {
    
    public function showAnnonces($id){
        $data = ['id'=>$id];
        $query = "SELECT produits.*, photos.nom AS photo FROM produits JOIN photos ON photos.produit_id = produits.id  WHERE produits.user_id =:id ORDER BY produits.id DESC";
        return $this->getQuery($query, $data);
    }
    
    public function insertAnnonces($user_id, $nom, $quantite, $description, $type, $date){
        $data = [
            'user_id'=>$user_id,
            'nom'=>$nom,
            'quantite'=>$quantite,
            'description'=>$description,
            'type'=>$type,
            'date'=>$date,
        ];
        //j'insert les donnée du produit et je recup le dernier id inserer
        $query = "INSERT INTO produits (user_id, nom, quantite, description, type, date) VALUES (:user_id, :nom, :quantite, :description, :type, :date)";
        //on recup le dernier id inserer (produit_id)
         $produit_id = $this->setQuery($query, $data);
         
         //j'insert l'id du produit dans photos.produit_id
         $nom = 'produit_'.$produit_id.'.jpg';
         $data = ['produit_id'=>$produit_id, 'nom'=>$nom];
        $query = "INSERT INTO photos (produit_id, nom) VALUES (:produit_id, :nom)";
        //on recup le dernier id inserer (photo_id)
        $photo_id = $this->setQuery($query, $data);
        
        // enregistrement de la photo dans le dossier et renommage
        $folder="./public/image/produits/";
        move_uploaded_file($_FILES['photo']['tmp_name'], $folder.$nom);
        
        //mise a jour du nom de la photo dans la bdd
         $data = [
     'nom' => $nom,
     'id' =>$photo_id];
     $query = "UPDATE photos SET nom=:nom WHERE id=:id";
     return $this->getQuery($query, $data);
        
    }
    
    
    public function deleteAnnonces($id){
        $data=['id'=>$id];
        $query ="DELETE FROM produits WHERE id=:id";
        $this->getQuery($query, $data);
        
        //je supprime la photo dans le dossier
        $folder="./public/image/produits/";
        $nom = 'produit_'.intval($_GET['id']).'.jpg';
                    if(file_exists($folder.$nom)){
                        unlink($folder.$nom);
                    }
    }
    
    //affiche les info de l'annonce que l'on veut modifier
    public function showAnnonceInfo($id){
        $data = ['id'=>$id];
        $query = 'SELECT * FROM produits WHERE id = :id';
        return $this->getQuery($query, $data);
    }


    public function updateAnnonces($nom, $description, $quantite, $id){
        $data = [
            'nom'=>$nom,
            'description'=>$description, 
            'quantite'=>$quantite,
            'id'=>$id
            ];
        $query = "UPDATE produits SET nom=:nom, description=:description, quantite=:quantite WHERE produits.id =:id";
        return $this->getQuery($query, $data);
    }
      
    
}