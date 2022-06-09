<?php
$title = "page d'admin";
ob_start();
$show = '';
if(!isset($action)){
    $action = '';
}
if(!isset($delete)){
    $delete = '';
}else{
    $delete = intval($_GET['delete']);
}

//$action = '';
if($_SESSION['Auth']=='admin'){
?>
    <h1>ma page admin</h1>

<!--choix des actions-->
    <a href="?page=admin&action=showAllAnnonces">Gerer les annonces</a>
    <a href="?page=admin&action=showAllMessages">Gerer les messages</a>
    <a href="?page=admin&action=showAllUsers">Gerer les users</a>

<?php
if(isset($action)){
    //si une action est passé en GET, affiche un tableau
?>    
    
    <table id="tableau-admin">
    <thead>
<?php
        
            //liste annonces
            if($action=="showAllAnnonces"){
                echo'<tr>
                        <th>Users</th>
                        <th>Produits/service</th>
                        <th>Quantité (en H ou KG)</th>
                        <th>Description</th>
                        <th>Type de produit</th>
                        <th>ville</th>
                        <th>Date de publication</th>
                    </tr>
            </thead>
            <tbody>';
                
                //affichage de la liste des annonces
                if($listeAllAnnonces->rowCount()){
                    echo'<p> nombre d\'annonce : '.$listeAllAnnonces->rowCount().'</p>';
                    while($listeA = $listeAllAnnonces->fetch(PDO::FETCH_ASSOC)) {
                        echo'
                                <tr>
                                    <td>'.$listeA['prenom'].' '.$listeA['nom'].'</td>
                                    <td>'.$listeA['prod_name'].'</td>
                                    <td>'.$listeA['quantite'].'</td>
                                    <td>'.$listeA['description'].'</td>
                                    <td>'.$listeA['type'].'</td>
                                    <td>'.$listeA['ville'].'</td>
                                    <td>'.$listeA['date'].'</td>
                                    <td><a href="?page=produit_view&id='.$listeA['product_id'].'">Voir l\'annonce</a></td>
                                    <td><a href="?page=admin&action=showAllAnnonces&delete='.$listeA['product_id'].'">Supprier cette annonce</a></td>
                                </tr>';
                    }
                }
            }
            
            //liste users
            if($action=="showAllUsers"){
               echo'<tr>
                        <th>Nom</th>
                        <th>Login</th>
                        <th>Type de compte</th>
                        <th>Mail</th> 
                        <th>Ville</th>
                        <th>Code postal</th>
                    </tr>
            </thead>
            <tbody>';
            //affichage listes des messages
                if($listeAllUsers->rowCount()){ 
                    echo'<p> nombre de users : '.$listeAllUsers->rowCount().'</p>';
                    while($listeU = $listeAllUsers->fetch(PDO::FETCH_ASSOC)) {
                        echo'
                                <tr>
                                    <td>'.$listeU['prenom'].' '.$listeU['nom'].'</td>
                                    <td>'.$listeU['login'].'</td>
                                    <td>'.$listeU['type_compte'].'</td>
                                    <td>'.$listeU['mail'].'</td>
                                    <td>'.$listeU['Ville'].'</td>
                                    <td>'.$listeU['code_postal'].'</td>
                                    <td><a href="?page=admin&action=showAllUsers&delete='.$listeU['id'].'">Supprimer ce user</a></td>
                                </tr>';
                            }
                             
                    }
               }
               
               //liste messages
               if($action=="showAllMessages"){
                   $compteur = 0;
               echo'<tr>
                        <th>Nom exp</th>
                        <th>Message</th>
                        <th>Nom Dest</th>
                        <th>Origin Id</th> 
                        <th>Message Id</th>
                    </tr>
            </thead>
            <tbody>';
            //affichage listes des messages
                if($listeAllMessages->rowCount()){

                echo'<p> nombre de messages : '.$listeAllMessages->rowCount().'</p>';
                    while($listeM = $listeAllMessages->fetch(PDO::FETCH_ASSOC)) {
                        echo'
                                <tr>
                                    <td>'.$listeM['prenom'].' '.$listeM['nom'].'</td>
                                    <td>'.$listeM['message'].'</td>';
                                    
                                    $namesDests = $allAnnonces->showNameDest($listeM['dest_id']);
                                    $show=$listeM['dest_id'];
                                    while($nameDest = $namesDests->fetch(PDO::FETCH_ASSOC)){
                                        echo '<td> '.$nameDest['nom'].' '.$nameDest['prenom'].' </td>';
                                    }
                                    
                                    echo'
                                    <td>'.$listeM['origin_id'].'</td>
                                    <td>'.$listeM['message_id'].'</td>
                                    <td><a href="?page=admin&action=showAllMessages&delete='.$listeM['message_id'].'">Supprimer ce message</a></td>
                                </tr>';
                            }
                             
                    }
               }
            }

        
        
            
?>
    </tbody>
    </table>
<?php
}else{
    
    echo'Vous n\'avez pas accès a cette page !';
}
$content = ob_get_clean();

require './view/template.php';