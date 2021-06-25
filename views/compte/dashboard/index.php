<?php var_dump($_SESSION) ?>

<div class="ban">
  <h1>Mon Compte</h1>
</div>
<div class="compte-titre">
  <h2>Bienvenu sur votre espace</h2>
</div>
<div class="dashboard__container">
  <div class="dashboard__content">
    <p>Votre nom: <?= $_SESSION['user']['nom'] ?> </p>
    <p>Votre prénom: <?= $_SESSION['user']['prenom'] ?> </p>
    <p>Votre adresse: <?= $_SESSION['user']['adresse'] ?> </p>
    <p>Votre téléphone: <?= $_SESSION['user']['tel'] ?> </p>
    <p>Votre email: <?= $_SESSION['user']['email'] ?> </p>
  </div>
</div>
<div class="compte-titre">
  <h2>Votre véhicule</h2>
</div>
<div class="dashboard__container">
  <div class="dashboard__content">
    <p>Plaque d'immatriculation:</p>
    <p>Année:</p>
    <p>Modèle:</p>
    <p>Marque:</p>
  </div>
</div>

<div class="button__container">
  <div class="dashboard__btn">
    <a href="">MODIFIER PROFIL</a>
  </div>
  <div class="dashboard__btn">
    <a href="Compte/logout">DECONNEXION</a>
  </div>
</div>