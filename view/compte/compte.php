<?php
$title='Mon compte';
ob_start();
?>

<h1>Mon compte</h1>
    
    <?php 
    echo'<h2>Bonjour '.$_SESSION['name'].' !</h2>
        <p>Que voulez vous faire ?</p>';
    echo $auth;
    ?>
    <div id="container-a-compte">
    <a class="btn" href="index.php?page=annonces" title="Gerer mes annonces" >Gerer mes annonces</a>
    <a class="btn" href="index.php?page=messages" title="Cliquez pour voir les messages">Voir mes messages</a>
    <a class="btn" href="?page=infos" title="Cliquez pour modifier vos infos">Gerer mes informations</a>
    <?php
    if($_SESSION['Auth']=='admin'){
        echo '
        <a class="btn" href="?page=admin" title="Gerer les fonction admin">Fonction de Boss</a>';
    }
    ?>
    <a class="btn" href="index.php?page=compte&deconnex=1" title="cliquez pour vous deconnecter">deconnexion</a>

<?php
$content = ob_get_clean();

require 'view/template.php';
 