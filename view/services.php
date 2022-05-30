<?php

$title = "page services";
ob_start();
?>
<h1>Tous les services</h1>

<div class="box-filtre">
            <button class="btn btn-travaux" >Travaux</button>
             <button class="btn btn-automobile" >Automobile</button>
             <button class="btn btn-jardin" >Jardin</button>
              <button class="btn btn-tout" >Tout voir</button>
</div>      

<section class="box-services">
    <?php
    if(isset($list_services)){
while($listes = $list_services->fetch(PDO::FETCH_ASSOC)){
    echo'
   <a  href="index.php?page=service_view&id='.$listes['id'].'" class="card-service service-'.$listes['id'].'">
        <div class="box-img-card-service">
        <img src="./public/image/produits/'.$listes['photo'].'" alt="tondeuse">-->
        </div>
        <p class="text-lieu-produit">Service demandé : <span class="vert bold">'.$listes['nom'].'</span><br>disponible à : <span class="vert bold">'.$listes['ville'].'</span><br>quantié disponible : <span class="vert bold">'.$listes['quantite'].'</span> Heure(s)<br>description : <span class="vert bold">'.$listes['description'].'</span></p>
    </a>';
}
}
    
?>    
</section>



<?php
$content = ob_get_clean();

require 'template.php';