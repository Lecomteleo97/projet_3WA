<?php
        require './model/ManageAdmin.php';
        
        $allAnnonces = new ManageAdmin;
    
//gestion des GET actions
if(isset($_GET['action'])){
    switch($_GET['action']){
        
    
                case 'showAllAnnonces' : 
                //gestion du delete 
                if(isset($_GET['delete'])){
                $allAnnonces->deleteAnnonceAdmin($_GET['delete']);
                echo 'annonce supprimé !';
                }
                //affichage de la liste des annonces
                $listeAllAnnonces = $allAnnonces->showAllAnnonces();   
                break; 
                
                case 'showAllMessages' :
                //affichage de tous les messages
                if(isset($_GET['delete'])){
                $allAnnonces->deleteMessageAdmin($_GET['delete']);
                echo'message supprimé !';
                }
                $listeAllMessages = $allAnnonces->showAllMessages();
                break;   
                
                case 'showAllUsers' :
                    if(isset($_GET['delete'])){
                $allAnnonces->deleteUserAdmin($_GET['delete']);
                echo'user supprimé !';
                    }
                //affiche liste des users
                $listeAllUsers = $allAnnonces->showAllUsers();
                break;
    }
    
    
    
 
    
    
}    




require './view/compte/admin.php';