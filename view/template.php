<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./public/css/style.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Kristi&family=Lato:ital,wght@0,100;0,300;0,400;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <title><?=$title?></title>
    
</head>
<body>
    <div id="mySidenav" class="sidenav">
  <a id="closeBtn" href="#" class="close">×</a>
  <ul>
    <li><a href="index.php?page=home">Accueil</a></li>
    <li><a href="index.php?page=produits">Les Dons</a></li>
    <li><a href="index.php?page=services">Les Services</a></li>
    <li><a href="index.php?page=compte">Mon Compte</a></li>
    <li><a href="index.php?page=contact">Contact</a></li>
  </ul>
</div>
    <header>
        <div id="box-nav">
        
<!------btn burger------->
<a href="#" id="openBtn">
  <span class="burger-icon">
    <span></span>
    <span></span>
    <span></span>
  </span>
</a>

<a href="index.php?page=home"><img id="logo-nav" src="./public/image/logo/logo-nav.png"></a>

<i>logo connexion</i>
</div>
    </header>
    <main><?=$content?></main>
    <footer></footer>
    
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="./public/js/script.js"></script>
    
</body>
</html>