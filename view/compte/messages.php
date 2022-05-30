<?php
ob_start();
var_dump($_SESSION);
$title="Mes messages";

if(isset($_GET['idconv'])){
    $idConv = $_GET['idconv'];
} 
?>

<h1>Mes Messages</h1>

<ul class="box-conv">
    <?php 
//affiche la liste des messages reçu et envoyé d'origine   
if($listeMessagesOrigin->rowCount()){
        while($listeM = $listeMessagesOrigin->fetch(PDO::FETCH_ASSOC)) {
    
            //filtre les messages d'origine qui sont envoyé par l'user
           if($_SESSION['id']==$listeM['exp_id']){
               
                    //appel db pour connaitre le nom du destinataire du message d'origine envoyé par le user
                        if($affNameDest->rowCount()){
                            while($listeD = $affNameDest->fetch(PDO::FETCH_ASSOC)){
                                echo '
                                <a href="index.php?page=messages&idconv='.$listeD['id'].'" 
                                class="msg-origin-'.$listeM['message_id'].' ">id message : '.$listeD['id'].'<br> 
                                id_origin : '.$listeD['origin_id'].'<br>
                                Message envoyé a :'.$listeD['prenom'].'<br> '.$listeD['date_crea'].' 
                                Message :'.$listeD['message'].'<br></a>';
                                var_dump($listeD['id']);
            //si l'id de conv est passé en GET
            if($listeD['id']==$idConv){
            //affihce les messages de la conversation GET commencé par le user
             $affMessagesConv = $message->showMessageConv($listeD['id']);
            if($affMessagesConv->rowCount()){
                while($listeMconv = $affMessagesConv->fetch(PDO::FETCH_ASSOC)){
                   echo '<li class="message-conv conv-'.$listeMconv['origin_id'].'  ">reponse de: '.$listeMconv['prenom'].'<br>
                          origin_id : '.$listeMconv['origin_id'].'
                   '.$listeMconv['message'].'</li><br>';
                }
            } 
            }
?>
<form method="post" action="index.php?page=messages">
    <input type="text" name="message"/>
    <input type="hidden" name="exp_id" value="<?=$_SESSION['id']?>"/>
    <input type="hidden" name="dest_id" value="<?=$listeD['dest_id']?>"/>
    <input type="hidden" name="origin_id" value="<?=$listeD['id']?>"/>
    <input type="hidden" name="lu_pas_lu" value="1"/>
     <input type="submit" name="submit" value="envoyer message"/>
</form>
<?php 
               
                            } 
                    } 
                        }else{ //les messages d'origine reçu par le user
                        echo '
                        <a href="index.php?page=messages&idconv='.$listeM['message_id'].'"
                        class="msg-origin-'.$listeM['message_id'].'">id message : '.$listeM['message_id'].'<br>
                     id_origin : '.$listeM['origin_id'].'<br>
                        Message de : '.$listeM['prenom'].' '.$listeM['nom'].' <br>
                    '.$listeM['date_crea'].' Message : '.$listeM['message'].'</a>
                        ';
                        
                        
              //si l'id de conv est en GET          
             if($listeM['message_id']==$idConv){           
            //affihce les messages de la conversation GET pas commencé par le user
            
           $affMessagesConv = $message->showMessageConv($listeM['message_id']);
            if($affMessagesConv->rowCount()){
                while($listeMconv = $affMessagesConv->fetch(PDO::FETCH_ASSOC)){
                   echo '<li class="message-conv conv-'.$listeMconv['origin_id'].'  " >reponse de: '.$listeMconv['prenom'].'<br>
                          origin_id : '.$listeMconv['origin_id'].'
                   '.$listeMconv['message'].'</li><br>';
                }
                }
            } 
        
           

?>
<form method="post" action="index.php?page=messages">
    <input type="text" name="message"/>
    <input type="hidden" name="exp_id" value="<?=$_SESSION['id']?>"/>
    <input type="hidden" name="dest_id" value="<?=$listeM['exp_id']?>"/>
    <input type="hidden" name="origin_id" value="<?=$listeM['message_id']?>"/>
    <input type="hidden" name="lu_pas_lu" value="1"/>
    
     <input type="submit" name="submit" value="envoyer message"/>
</form>
<?php 
                
            }
        }     
}

    ?>
</ul>
<?php
//fonction admin
if($_SESSION['Auth']=='admin'){
        echo '
        <a href="">Fonction de Boss</a>';
}
    
    
$content = ob_get_clean();

require 'view/template.php';