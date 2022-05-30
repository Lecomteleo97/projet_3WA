<?php

$title = "page d'annonce";

//quand action = modify, recupere les element deja enregistré de l'annonce
if(isset($annInfo)) {
    $annInfo = $annInfo->fetch();
} else {
    $annInfo['nom'] = '';
    $annInfo['description'] = '';
    $annInfo['quantite'] = '';
    $annInfo['type'] = '';
    $annInfo['date'] = '';
}
ob_start();
?>
<h1>page annonces</h1>
<a class="btn" href="index.php?page=annonces&action=create">ajouter une annonce</a>
<?php


//affiche un formulaire si action create ou mofify 
if(isset($action)){
    if($action=='create' || $action='modify'){
 ?>
<form method="post" action="index.php?page=annonces&id=<?=$id?>" class="form-annonce" enctype="multipart/form-data">
    
    <input type="text" name="nom" placeholder="nom" value="<?=$annInfo['nom']?>"/>
    <input type="number" name="quantite" placeholder="quantité en kg/temps en heure" value="<?=$annInfo['quantite']?>"/>
    <input type="text" name="description" placeholder="description" value="<?=$annInfo['description']?>"/>
    <select name="type" value="<?=$annInfo['type']?>">
        <option value="produit legume">dons legume</option>
        <option value="produit fruit">dons fruit</option>
        <option value="service">service</option>
    </select>
    <input type="file" name="photo" value=""/>
    <input type="text" name="date" placeholder="date" value="<?=$annInfo['date']?>"/>
    <input type="submit" name="submit" value="<?=$button?>"/>
    
</form>


<?php
}}


//affichage de la liste des annonce de l'user
if($liste->rowCount()) {
    while($listeA = $liste->fetch(PDO::FETCH_ASSOC)) {
        echo
        '<a href="" class="card-produit produit'.$listeA['id'].'">
        <div class="box-img-card-produit">
        <img src="./public/image/produits/'.$listeA['photo'].'" alt="artichaud">
        </div>
        <p class="text-lieu-produit">'.$listeA['nom'].'<br>'.$listeA['quantite'].'KG<br>'.$listeA['description'].'</p>
    </a>
    <a class="btn" href="index.php?page=annonces&action=modify&id='.$listeA['id'].'">Modifier cette annonce</a>
    <a class="btn" href="index.php?page=annonces&action=delete&id='.$listeA['id'].'">Supprimer cette annonce</a>';
    }
}
$content = ob_get_clean();


require './view/template.php';