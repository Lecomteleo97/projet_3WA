<?php

require_once __DIR__.'/Manage.php';

//fonction gestion des infos users
class ManageInfos extends Manage {
    
    //affiche les infos
    public function showInfosUser($id){
        $data = ['id'=> $id];
        $query="SELECT mdp, `nom`,`prenom`,`mail`,`code_postal`,`Ville`,`login` FROM `users` WHERE id = :id";
        return $this->getQuery($query, $data);
    }
    
    //update des infos
    public function updateInfos($id, $nom, $prenom, $mail, $code_postal, $ville, $login){
        $data = [
            'id'=>$id, 
            'nom'=>$nom, 
            'prenom'=>$prenom, 
            'mail'=>$mail, 
            'code_postal'=>$code_postal,
            'ville'=>$ville, 
            'login'=>$login, 
                ];
        $query="UPDATE users SET nom=:nom, prenom=:prenom, mail=:mail, code_postal=:code_postal, Ville=:ville, login=:login WHERE id = :id";
         return $this->getQuery($query, $data);
        
    }
    
    
    //fonction modif pwd
    public function updadePassword($id, $newPwd){
    $data=['id'=>$id,'mdp'=>$newPwd];
    $query="UPDATE users SET mdp=:mdp WHERE id = :id";
    return $this->getQuery($query, $data);
    }
    
    
    
    
    
}