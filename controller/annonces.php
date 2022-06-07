<?php
        
        require './model/ManageAnnonces.php';
        $ann = new ManageAnnonces();
        
    
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}       
//gestion des GET actions
if(isset($_GET['action'])){
    switch($_GET['action']){
                case 'delete' : 
                    //appel db delete
                    $ann->deleteAnnonces($id);
                    $button = '';
                break;  
                
                case 'create' :
                    $button = "poster";
                break;    
                    
                case 'modify' : 
                    //appel db update
                    $annInfo = $ann->showAnnonceInfo($id);
                    $button = "enregistrer";
                break;
                
                default : 
                    $button = '';
                    
    }
}
       
//gestion du formuaire de création d'annonces
if(isset($_POST['submit']) && $_POST['submit']=='poster'){
    
    $nom = htmlspecialchars(trim($_POST['nom']));
    $quantity = htmlspecialchars(trim($_POST['quantite']));
    $description = htmlspecialchars(trim($_POST['description']));
    $type = htmlspecialchars(trim($_POST['type']));
    $date = htmlspecialchars(trim($_POST['date']));

    
    //insertion des info en db                
  $poste = $ann->insertAnnonces($_SESSION['id'], $nom, $quantity, $description, $type, $date);
  echo '<h2>annonce Enregistré !</h2>';
}


  //traitement formulaire de modification      
  if(isset($_POST['submit']) && $_POST['submit']=='enregistrer'){
    $nom = htmlspecialchars(trim($_POST['nom']));
    $quantity = htmlspecialchars(trim($_POST['quantite']));
    $description = htmlspecialchars(trim($_POST['description']));
    
        //mise a jour des info en db
         $ann->updateAnnonces($nom, $description ,$quantity, $id);  
  echo '<h2>annonce Modifié !</h2>';
}
      
   //affichage de la liste des annonces
$liste = $ann->showAnnonces($_SESSION['id']);       
       
       
        
require './view/compte/annonces.php';