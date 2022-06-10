<?php

$title = "page produits";

ob_start();

switch($page){
    case 'produits' :
    echo '
        <h1>Tous les produits</h1>
        <div class="box-filtre">
            <button class="btn btn-legumes" >Légumes</button>
             <button class="btn btn-fruits" >Fruits</button>
              <button class="btn btn-tout" >Tout voir</button>
        </div>';
    break;

    case  'services' :
    echo '
        <h1>Tous les services</h1>
        <div class="box-filtre">
            <button class="btn btn-maison" >Maison</button>
             <button class="btn btn-auto" >Automobile</button>
              <button class="btn btn-tout-serv" >Tout voir</button>
        </div>';
    break;
}
?>
<section class="box-produits">

<?php
    if(isset($list_produits)){
        while($listep = $list_produits->fetch(PDO::FETCH_ASSOC)){
            echo '<a href="index.php?page=produit_view&id='.$listep['id'].'" class="card-produit '.$listep['type'].' produit'.$listep['id'].' flex" title="Cliquez pour afficher les details">
                <div class="box-img-card-produit">
                <img src="./public/image/produits/'.$listep['photo'].'" alt="artichaud">-->
                </div>
                <p class="text-lieu-produit"><span class="vert bold">'.$listep['nom'].'</span><br>disponible à : <span class="vert bold">'.$listep['ville'].'</span><br>quantié disponible : <span class="vert bold">'.$listep['quantite'].'</span>KG<br></p>
                    </a>';
        }   
    }
?>
  
</section>
<?php
$content = ob_get_clean(); 

require 'template.php';