<?php

$title = "page produit view";

ob_start();

?>

<div class="box-presentation-view">
    <h2><?=$produit['nom']?> à <?=$produit['ville']?></h2>
    <img src="./public/image/produits/<?=$produit['photo']?>" alt="tondeuse"></img>
    <div class="box-txt-presentation-view">
    
    <p><?=$produit['user_name'].' '.$produit['user_prenom']?></p>
    <p><?=$produit['description']?></p>
    <p> Disponible :<?=$produit['quantite']?> KG
    </div>
</div>

<?php
if(isset($_SESSION['Auth'])){
?>
<form class="form-contact-user-view" method="post" action="index.php?page=produit_view&id=<?=$produit['id']?>" > 
    <textarea name="message" placeholder="saisir le message"/></textarea>
    <input class="btn" type="submit" name="submit" value="envoyer un message"/>
</form>
<?php
}
?>

<form class="form-contact-view">
    <input type="text" name="nom" placeholder="votre nom"/>
    <input type="text" name="mail" placeholder="votre mail"/>
    <input type="textarea" name="message" placeholder="saisir le message"/>
    <button class="btn" type="submit" value="Submit">envoyer un mail</button>
</form>



<?php
$content = ob_get_clean();


require 'template.php';