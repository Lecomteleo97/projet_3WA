<?php
$title='Mon compte';
ob_start();
?>

<h1>Mon compte</h1>
    
    <?php 
    echo'<h2>bonjour '.$_SESSION['name'].'</h2> ';
    echo'<h3>Vous êtes '.$_SESSION['Auth'].'</h3> ';
    echo $auth;
    ?>
    <a href="index.php?page=annonces" title="Gerer mes annonces" >Gerer mes annonces</a>
    <a href="index.php?page=messages" title="Cliquez pour voir les messages">Voir mes messages</a>
    <?php
    if($_SESSION['Auth']=='admin'){
        echo '
        <a href="">Fonction de Boss</a>';
    }
    ?>
    <a href="index.php?page=compte&deconnex=1" title="cliquez pour vous deconnecter">deconnexion</a>

<?php
$content = ob_get_clean();

require 'view/template.php';
 