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
<a class="btn" href="index.php?page=annonces&action=create" title="ajouter une annonce">ajouter une annonce</a>
<?php


//affiche un formulaire si action create ou mofify 
if(isset($action)){
    if($action=='create' || $action='modify'){
 ?>
<form method="post" action="?page=annonces&id=<?=$id?>" class="form-annonce" enctype="multipart/form-data">
    
    <input type="text" name="nom" maxlength="30" required pattern="^[A-Za-z '-]+$" placeholder="nom" value="<?=$annInfo['nom']?>"/>
    <input type="number" name="quantite" required pattern="[0-9]"placeholder="quantité en kg/temps en heure" value="<?=$annInfo['quantite']?>"/>
    <input type="text" name="description" maxlength="150" required placeholder="description" value="<?=$annInfo['description']?>"/>
    <select name="type" required value="<?=$annInfo['type']?>">
        <option value="produit legume">dons legume</option>
        <option value="produit fruit">dons fruit</option>
        <option value="service maison">service maison</option>
        <option value="service auto">service automobile</option>
    </select>
<?php
//si création obligé de mettre la photo
    if($action=='create'){
    echo '<input type="file" name="photo" required accept="image/jpeg" value=""/>';
    }
?>
    <input type="date" name="date" placeholder="date" required value="
        <?=$annInfo['date']?>"/>
    <input type="submit" name="submit" value="<?=$button?>"/>
</form>
<?php
}}


//affichage de la liste des annonce de l'user
if($liste->rowCount()) {
    while($listeA = $liste->fetch(PDO::FETCH_ASSOC)) {
        echo
        '<a href="index.php?page=produit_view&id='.$listeA['id'].'" class="card-produit produit'.$listeA['id'].'" title="Voir cette annonce">
            <div class="box-img-card-produit">
                <img src="./public/image/produits/'.$listeA['photo'].'" alt="'.$listeA['photo'].'">
            </div>
            <p class="text-lieu-produit">'.$listeA['nom'].'<br>'.$listeA['quantite'].'KG<br>'.$listeA['description'].'</p>
        </a>
        <a class="btn" href="index.php?page=annonces&action=modify&id='.$listeA['id'].'" title="Modifier l\'annonce">Modifier cette annonce</a>
        <a class="btn" href="index.php?page=annonces&action=delete&id='.$listeA['id'].'" title="supprimer l\'annonce" >Supprimer cette annonce</a>';
    }
}
$content = ob_get_clean();


require './view/template.php';