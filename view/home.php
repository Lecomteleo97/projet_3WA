<?php

$title = "page d'accueil";

ob_start();
?>

<!------slide----------->
<div class="swiper">
  <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
            <div class="box-presentation">
                <p>Un surplus de stock alimentaire ? </p>
                <p>Au lieu de jeter vous pouvez donner !</p>
                <a class="btn btn-inscrire"href="index.php?page=compte">S'inscrire</a>
                <img src="./public/image/donnateur/fermier-panier.jpg" alt="fermier-paneir">
            </div>
        </div>
        <div class="swiper-slide">
            <div class="box-presentation">
                <p>Besoin d'un service ?</p>
                <p>Demandez de l'aide ou proposez la votre ici !</p>
                <a class="btn btn-inscrire" href="">S'inscrire</a>
                <img src="./public/image/produits/tondeuse.jpg" alt="tondeuse">
            </div>
        </div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<h1>Au lieu de gaspiller, donner !</h1>

<section class="explixation">
    <p class="txt-explication">Que ce soit vôtre temps ou des denrées alimentaire, ici vous pouvez tous donner !
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, dicta nisi voluptatem consequatur labore blanditiis adipisci enim eos eligendi assumenda cumque deserunt quis suscipit fugit neque dolores veritatis tenetur. Veritatis, voluptatibus amet illo </p>
        <div class="explication-draw">
        <h2>Pour donner c'est facile !</h2>
        
        <p><i class="fa-solid fa-address-card"></i><br>Créé un compte</p>
        
        <p><i class="fa-solid fa-user-check"></i><br>Connecter-vous et ajouter une annonce</p>
       
        <p><i class="fa-solid fa-comments"></i><br>Les personnes interessé vous contacterons par mail ou via le chat</p>
    </div>
</section>

<!--------presentatio ndernier produits-------->
<section class="section-new-pdt">
<h2>Produits les plus récents</h2>

<div id="box-new-produits">
<?php
if(isset($list_produits)){
while($listep = $list_produits->fetch(PDO::FETCH_ASSOC)){
    echo'
<a href="index.php?page=produit_view&id='.$listep['id'].'" title="Cliquez pour voir ce produit" class="card-new-p p'.$listep['id'].'">
<img src="./public/image/produits/'.$listep['photo'].'">
<p>'.$listep['ville'].'</p>
</a>

';
}
}
?>
<a class="btn btn-voir-produits" href="index.php?page=produits">Voir plus</a>
</div>
</section>

<div class="explication-draw">
        <h2>Une annonce vous interesse ?</h2>
        
        <p><i class="fa-solid fa-address-card"></i><br>Créé un compte</p>
        
        <p><i class="fa-solid fa-user-check"></i><br>Connecter-vous et selectionner le produit ou service</p>
       
        <p><i class="fa-solid fa-comments"></i><br>Contacter la personne via la page de produit et echanger avec lui par mail ou via le chat</p>
    </div>


<section class="section-new-srv">
<h2>Les dernières demande de services</h2>

<div id="box-new-services">
    <?php
if(isset($list_services)){
while($listes = $list_services->fetch(PDO::FETCH_ASSOC)){
    echo'
<a href="index.php?page=service_view&id='.$listes['id'].'" title="Cliquez pour voir ce service" class="card-new-s s'.$listes['id'].'" >
<img src="./public/image/produits/'.$listes['photo'].'">
<p>'.$listes['ville'].'</p></a>';
}
}
?>
<a class="btn btn-voir-services" href="index.php?page=services">Voir plus</a>
</div>
</section
<?php
$content = ob_get_clean();

require 'template.php';