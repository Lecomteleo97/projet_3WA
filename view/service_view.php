<?php

$title = "page service view";

ob_start();

$produit = $info_produit -> fetch();

echo '

<div class="box-presentation-view">
    <h2>'.$produit['nom'].' à '.$produit['ville'].'</h2>
    <img src="./public/image/produits/'.$produit['photo'].'" alt="tondeuse"></img>
    <div class="box-txt-presentation-view">
    
    <p>'.$produit['user_name'].' '.$produit['user_prenom'].'</p>
    <p>'.$produit['description'].'</p>
    </div>
</div>
<form class="form-contact-view">
    <input type="text" name="nom" placeholder="votre nom"/>
    <input type="text" name="mail" placeholder="votre mail"/>
    <input type="textarea" name="message" placeholder="saisir le message"/>
    <button class="btn" type="submit" value="Submit">envoyer un mail</button>
</form>';





$content = ob_get_clean();

require 'template.php';