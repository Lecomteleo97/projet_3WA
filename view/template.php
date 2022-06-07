<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="png" href="./public/image/logo/favicon-32x32.png">
    <!--<link href="https://fonts.googleapis.com/css2?family=Kristi&family=Lato:ital,wght@0,100;0,300;0,400;1,100;1,300;1,400&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <link rel="stylesheet" href="./public/css/style.css" type="text/css" />
    <title><?=$title?></title>
    
</head>
<body>
    <div id="mySidenav" class="sidenav">
  <a id="closeBtn" href="#" class="close">×</a>
  <ul>
    <li><a href="index.php?page=home" title="Aller a l'accueil">Accueil</a></li>
    <li><a href="index.php?page=produits" title="Voir tous les dons">Les Dons</a></li>
    <li><a href="index.php?page=services" title="Voir tous les services">Les Services</a></li>
    <li><a href="index.php?page=compte" title="Acceder à mon compte">Mon Compte</a></li>
    <li><a href="index.php?page=contact" title="Page de contact">Contact</a></li>
  </ul>
</div>
    <header>
        <div id="box-nav">
        
<!------btn burger------->
<a href="#" id="openBtn" title="Ouvrir le menu">
  <span class="burger-icon">
    <span></span>
    <span></span>
    <span></span>
  </span>
</a>

<a href="index.php?page=home" title="Retour à l'accueil"><img id="logo-nav" src="./public/image/logo/logo-nav.png"></a>

<a href="index.php?page=compte" title="Acceder à mon compte"><i class="fa-solid fa-user logo-user"></i></a>
</div>
    </header>
    <main><?=$content?></main>
    <footer></footer>
    
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="./public/js/script.js"></script>
    
</body>
</html>