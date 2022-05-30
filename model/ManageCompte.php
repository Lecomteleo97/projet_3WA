<?php

require_once 'model/Manage.php';

//fonction gestion du compte
class ManageCompte extends Manage {
    
    
    //verifie si le compte est enregistré
    public function getAccount($name,$mdp){
        $data = ['name'=>$name,'mdp'=>$mdp];
        $query = "SELECT id,login,type_compte,prenom FROM users WHERE login=:name AND mdp=:mdp";
        return $this->getQuery($query, $data);
    }
    
    
    //insert les nouveaux comptes dans db
    public function insertAccount($nom, $prenom, $login, $pwd, $mail, $postal, $ville, $type){
         $data = ['nom'=>$nom,'prenom'=>$prenom,'login'=>$login,'pwd'=>$pwd,'mail'=>$mail, 'postal'=>$postal, 'ville'=>$ville, 'type'=>$type];
         $query = "INSERT INTO users (nom, prenom, mail, code_postal, ville, login, mdp, type_compte) VALUES (:nom, :prenom, :mail, :postal, :ville, :login, :pwd, :type)";
         return $this->getQuery($query, $data);
         
    }
}