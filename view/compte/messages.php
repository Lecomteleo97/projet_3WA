<?php
ob_start();
$title="Mes messages";
$nameconv = '';
$conversation = 'cliquez sur la conversation pour voir les messages';

if(isset($_GET['idconv'])){
    $idConv = $_GET['idconv'];
} 
?>

<h1>Mes Messages</h1>
<section class="section-conv">
<div class="box-conv">
    <h3>Mes conversations</h3>
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
                    class="msg-origin-'.$listeD['id'].' '.$listeD['prenom'].'">
                    <i class="fa-solid fa-comments"></i>  
                    '.$listeD['prenom'].' '.$listeD['nom'].'</a>';
            //si l'id de conv est passé en GET
            if($listeD['id']==$idConv){
                $nameconv = $listeD['prenom'];
                $conversation = '<ul class="liste-bulle"><li>'.$listeD['date_crea'].' 
                                Message envoyé :'.$listeD['message'].'</li><br>';
            //affihce les messages de la conversation GET commencé par le user
             $affMessagesConv = $message->showMessageConv($listeD['id']);
            if($affMessagesConv->rowCount()){
                while($listeMconv = $affMessagesConv->fetch(PDO::FETCH_ASSOC)){
                   $conversation .= '<li class="message-conv conv-'.$listeMconv['origin_id'].'  '.$listeMconv['prenom'].'">'.$listeMconv['prenom'].' :<br>
                   '.$listeMconv['message'].'</li>';
                }
            } 
            
$conversation .= '
<li><form method="post" action="index.php?page=messages">
    <textarea name="message" placeholder="saisir le message"/></textarea>
    <input type="hidden" name="exp_id" value="'.$_SESSION['id'].'"/>
    <input type="hidden" name="dest_id" value="'.$listeM['exp_id'].'"/>
    <input type="hidden" name="origin_id" value="'.$listeM['message_id'].'"/>
    <input type="hidden" name="lu_pas_lu" value="1"/>
    
     <button type="submit" name="submit" value="envoyer message"/><i class="fa-solid fa-paper-plane"></i></button>
</form>
</li></ul>';
} //echo '</ul>';
              
                } 
            } 
        }else{ //les messages d'origine reçu par le user
                        echo '
                       <a href="index.php?page=messages&idconv='.$listeM['message_id'].'"
                        class="msg-origin-'.$listeM['message_id'].'">
                        <i class="fa-solid fa-comments"></i> 
                        '.$listeM['prenom'].' '.$listeM['nom'].' </a>';
                        
              //si l'id de conv est en GET          
             if($listeM['message_id']==$idConv){   
                 $nameconv = $listeM['prenom'];
            //affihce les messages de la conversation GET pas commencé par le user
            $conversation = '<ul class="liste-bulle"><li>'.$listeM['date_crea'].'<br>
           '.$listeM['prenom'].' : '.$listeM['message'].'</li><br>';
           $affMessagesConv = $message->showMessageConv($listeM['message_id']);
            if($affMessagesConv->rowCount()){
                while($listeMconv = $affMessagesConv->fetch(PDO::FETCH_ASSOC)){
                   $conversation .= '
                   <li class="message-conv conv-'.$listeMconv['origin_id'].' '.$listeMconv['prenom'].'">'.$listeMconv['prenom'].' :<br>
                   '.$listeMconv['message'].'</li><br>';
                }
                }
            
        
             

$conversation .= '
<li><form method="post" action="index.php?page=messages">
   <textarea name="message" placeholder="saisir le message"/></textarea>
    <input type="hidden" name="exp_id" value="'.$_SESSION['id'].'"/>
    <input type="hidden" name="dest_id" value="'.$listeM['exp_id'].'"/>
    <input type="hidden" name="origin_id" value="'.$listeM['message_id'].'"/>
    <input type="hidden" name="lu_pas_lu" value="1"/>
    
     <button type="submit" name="submit" value="envoyer message"/><i class="fa-solid fa-paper-plane"></i></button>
</form>
</li></ul>';
}
                
        }
    }     
}

    ?>
</div>
<div class="container-show-conv">
    <i class="fa-solid fa-xmark"></i>
    <h3><?=$nameconv?></h3>
    <?=$conversation?>
</div>
</section>
<?php
//fonction admin
if($_SESSION['Auth']=='admin'){
        echo '
        <a href="">Fonction de Boss</a>';
}
    
?>
<script type="text/javascript" >
    //gestion messages affichage
let boxConv = document.querySelector('.container-show-conv');
let messageSend = document.querySelectorAll('.<?=$_SESSION['prenom']?>');
for(let i of messageSend){
    i.classList.add('rigth-message');
}
</script>
<?php
$content = ob_get_clean();

require 'view/template.php';