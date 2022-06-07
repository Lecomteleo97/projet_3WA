<?php

require_once 'model/Manage.php';

class ManageMessages extends Manage {
    
    //affiche tous les messages d'origine de conversation 0 lié par l'id SESSION
    public function showMessagesOrigin($user_id){
        $data=['id'=>$user_id];
        $query = "SELECT messages.id AS message_id, messages.dest_id, messages.exp_id,messages.message, messages.date_crea, messages.origin_id, messages.lu_pas_lu, users.* FROM messages JOIN users ON users.id = messages.exp_id WHERE messages.origin_id=0 AND messages.dest_id=:id OR
        messages.origin_id=0 AND messages.exp_id=:id";
        return $this->getQuery($query, $data);
    }
    
    //affiche le nom du destinataire d'un message envoyé par le user
    public function showDestMessageSend($id){
        $data=[
                'id'=>$id];
        $query = "SELECT users.*, messages.* FROM messages JOIN users ON users.id = messages.dest_id WHERE messages.exp_id=:id AND messages.origin_id=0";
        return $this->getQuery($query, $data);
    }
 
    //affiche les messages relier au message d'origine
    public function showMessageConv($id){
        $data=['id'=>$id];
        $query = "SELECT messages.*, users.prenom, users.id AS user_id FROM messages JOIN users ON users.id=messages.exp_id  WHERE messages.origin_id =:id";
        return $this->getQuery($query, $data);
    }
    
    //envoi du message dans le formulaire
    public function sendMesssage($exp_id,$dest_id,$message,$origin_id,$lu_pas_lu){
        $data=['exp_id'=>$exp_id,
                'dest_id'=>$dest_id,
                'message'=>$message, 
                'origin_id'=>$origin_id,
                'lu_pas_lu'=>$lu_pas_lu];
        $query="INSERT INTO messages (exp_id, dest_id, message, origin_id, lu_pas_lu, date_crea) VALUES (:exp_id, :dest_id, :message, :origin_id, :lu_pas_lu, NOW())";
        return $this->getQuery($query, $data);
        
    }


    public function findOriginId($dest_id,$exp_id){
        $data = ['dest_id'=>$dest_id,
                 'exp_id'=>$exp_id];
        $query = "SELECT origin_id FROM messages WHERE (exp_id=:exp_id AND dest_id=:dest_id) OR (exp_id=:dest_id AND dest_id=:exp_id) AND origin_id>0 ORDER by origin_id DESC LIMIT 1";
        return $this->getQuery($query, $data);
    }

}

