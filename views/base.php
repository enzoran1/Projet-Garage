<!doctype html>
<html lang="fr">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/style.css">

<title><?= $title ?? '' ?></title>

</head>

<body>
  <header>
    <nav class="navbar">
      <div class="navbar__logo">
        <a href="/"> <img src="/image/logo-nav.png" alt="logo"></a>
      </div>
      <div class="navbar__container">
        <div class="navbar__container-panier">
          <a href="/Panier"> <img src="/image/icons8-shopping-cart-48.png" alt="icon"></a>
        </div>
        <span class="navbar__container-burger">
          <svg viewBox="0 0 100 80" widht="40" height="40">
            <rect fill="#FFFFFF" width="100" height="5"></rect>
            <rect fill="#FFFFFF" y="30" width="100" height="5"></rect>
            <rect fill="#FFFFFF" y="60" width="100" height="5"></rect>
          </svg>
        </span>
      </div>
      <ul class="navbar__menu">
        <li class="navbar-menu__item">
          <a href="/">Accueil</a>
        </li>
        <li class="navbar-menu__item">
          <a href="/Prestation">Prestations</a>
        </li>
        <li class="navbar-menu__item">
          <a href="">Rendez-vous</a>
        </li>
        <li class="navbar-menu__item">
          <a href="/Annonces">Achat véhicules</a>
        </li>
        <li class="navbar-menu__item">
          <a href="/Compte">Compte</a>
        </li>
        <li class="navbar-menu__item">
          <a href="/Contact">Contacts</a>
        </li>

        <?php
        // Ce lien de la barre nav est uniquement disponible pour les utilisateurs admin * 
        if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'ROLE_ADMIN') { ?>
          <li class="navbar-menu__item">
            <a href="/Admin">Admin</a>
          </li>
        <?php  } ?>
      </ul>
    </nav>

    <nav class="navbar2">
      <div class="navbar2__flex">
        <div class="navbar2__logo">
          <a href="/"> <img src="/image/logo-nav.png" alt="logo"> </a>
          <a href="/">
            <p>Garage Jovanic</p>
          </a>
        </div>
        <ul class="navbar2__menu">
          <li class="navbar2__menu-item"><a href="/">Accueil</a></li>
          <li class="navbar2__menu-item"><a href="/prestation">Prestations</a></li>
          <li class="navbar2__menu-item"><a href="">Rendez-vous</a></li>
          <li class="navbar2__menu-item"><a href="/Annonces">Achat véhicules</a></li>
          <li class="navbar2__menu-item"><a href="/Compte">Compte</a></li>
          <li class="navbar2__menu-item"><a href="/Contact">Contacts</a></li>
          <?php
          // Ce lien de la barre nav est uniquement disponible pour les utilisateurs admin * 
          if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'ROLE_ADMIN') { ?>
            <li class="navbar2__menu-item">
              <a href="/Admin">Admin</a>
            </li>
          <?php  } ?>

        </ul>
        <div class="navbar2__panier">
          <a href="/Panier"> <img src="/image/icons8-shopping-cart-48.png" alt="icon shopping"></a>
        </div>
      </div>
    </nav>
  </header>
  <div class="container">

    <?= $contenu ?>

  </div>
  <footer class="footer">
    <div class="footer__top">
      <img src="/image/logo-nav.png" alt="">
      <h3>Garage Jovanic</h3>
    </div>
    <div class="footer__center">
      <h3>Nos Réseaux</h3>
      <img src="/image/icons8-instagram-vieux-logo-50.png" alt="insta">
      <img src="/image/icons8-facebook-entouré-50.png" alt="facebook">
      <img src="/image/icons8-logo-google-50.png" alt="google">
      <img src="/image/icons8-twitter-entouré-50.png" alt="twitter">
    </div>
    <div class="footer__bottom">
      <h3>Nos Contacts</h3>
      <p>78, rue du général Metman</p>
      <p>57070 METZ</p>
      <p>03.87.74.15.55</p>
      <a href="">jchristophe.colas@gmail.com</a>
    </div>
  </footer>
  <script src="/js/script.js"></script>
  <script src="/js/modal.js"></script>

</body>

</html>