<?php 
class Manage {
    
    protected function db_connect() {
$server = 'db.3wa.io';
$login = 'leolecomte';
$pwd = '51038b1c45068d212cc5a3147c08b191';
$base = 'leolecomte_projet';


try {
    $db = new PDO('mysql:host='.$server.';port=3306;dbname='.$base.';charset=utf8', $login, $pwd);    
}
catch (PDOException $e) {
    echo '<h3>Site en maintenance...</h3>';
    echo $e->getMessage();
    exit;
}
return $db;
   }
   
   protected function getQuery($query, $data = []){
        $db = $this->db_connect();
        $stmt = $db->prepare($query);
        $stmt->execute($data);
        return $stmt;
   }
   
   //fonction qui fait comme getQuery mais en recupererant le dernier id inserer en db avec lastInsertId
   protected function setQuery($query, $data = []){
        $db = $this->db_connect();
        $stmt = $db->prepare($query);
        $stmt->execute($data);
        return $db->lastInsertId();
   }
   
}
?>