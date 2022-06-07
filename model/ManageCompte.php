<?php

require_once 'model/Manage.php';

//fonction gestion du compte
class ManageCompte extends Manage {
    
    
    //verifie si le compte est enregistré
    public function getAccount($name){
        $data = ['name'=>$name];
        $query = "SELECT id,login,type_compte,prenom,mdp FROM users WHERE login=:name";
        return $this->getQuery($query, $data);
    }
    
    
    //insert les nouveaux comptes dans db
    public function insertAccount($nom, $prenom, $login, $pwd, $mail, $postal, $ville){
         $data = ['nom'=>$nom,'prenom'=>$prenom,'login'=>$login,'pwd'=>$pwd,'mail'=>$mail, 'postal'=>$postal, 'ville'=>$ville];
         $query = "INSERT INTO users (nom, prenom, mail, code_postal, ville, login, mdp) VALUES (:nom, :prenom, :mail, :postal, :ville, :login, :pwd)";
         return $this->getQuery($query, $data);
         
    }
}