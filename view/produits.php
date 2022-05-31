<?php

$title = "page produits";

ob_start();
?>
<h1>Tous les produits</h1>

<div class="box-filtre">
            <button class="btn btn-legumes" >Légumes</button>
             <button class="btn btn-fruits" >Fruits</button>
              <button class="btn btn-tout" >Tout voir</button>
</div>      
<section class="box-produits">

<?php
    if(isset($list_produits)){
while($listep = $list_produits->fetch(PDO::FETCH_ASSOC)){
     echo '<a href="index.php?page=produit_view&id='.$listep['id'].'" class="card-produit '.$listep['type'].' produit'.$listep['id'].'">
        <div class="box-img-card-produit">
        <img src="./public/image/produits/'.$listep['photo'].'" alt="artichaud">-->
        </div>
        <p class="text-lieu-produit">Produit à donner : <span class="vert bold">'.$listep['nom'].'</span><br>disponible à : <span class="vert bold">'.$listep['ville'].'</span><br>quantié disponible : <span class="vert bold">'.$listep['quantite'].'</span>KG<br>description : <span class="vert bold">'.$listep['description'].'</span></p>
    </a>';
}

    
}
  ?>
  
</section>









<?php
$content = ob_get_clean(); 

require 'template.php';