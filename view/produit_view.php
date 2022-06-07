<?php

switch($page){
    
    case 'produit_view' :
        $title = "page produit view";
        $quantity = "Kg";
        break;
        
    case 'service_view' :
        $title = "page service view";
        $quantity = "Heure(s)";
        break;

}
ob_start();

?>

<div class="box-presentation-view">
    <h2><?=$produit['nom']?> à <?=$produit['ville']?></h2>
    <img src="./public/image/produits/<?=$produit['photo']?>" alt="tondeuse"></img>
    <div class="box-txt-presentation-view">
    
    <p><?=$produit['user_name'].' '.$produit['user_prenom']?></p>
    <p><?=$produit['description']?></p>
    
    <p> Disponible :<?=$produit['quantite'].''.$quantity?></p>
   
    </div>
</div>

<?php
if(isset($_SESSION['Auth'])){
?>
<form class="form-msg-user-view" method="post" action="index.php?page=produit_view&id=<?=$produit['id']?>" > 
    <textarea name="message" required maxlength="200" placeholder="saisir le message"/></textarea>
    <input class="btn" type="submit" name="submit" value="envoyer un message"/>
</form>
<?php
}
?>

<form class="form-contact-view" metod="post" action="index.php?page=produit_view&id=<?=$produit['id']?>">
    <input required type="text" name="nom" placeholder="votre nom"/>
    <input required type="text" name="mail" placeholder="votre mail"/>
    <input required type="textarea" name="message" placeholder="saisir le message"/>
    <input class="btn" type="submit" value="envoyer un mail"/>
</form>



<?php
$content = ob_get_clean();


require 'template.php';