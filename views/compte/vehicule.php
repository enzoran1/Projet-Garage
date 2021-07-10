<div class="ban" id="ban-vehicule-utilisateur">
  <h1>Mes véhicules</h1>
</div>


<div class="test">
<?php foreach ($vehicules as $vehicule) : ?>
<div class="carte_utilisateur">
  <div class="carte__utilisateur-container">
    <div class="utilisateur__prenom-nom">
      <div class="utilisateur__flex">
        <p id="utilisateur_color">Plaque d'immatriculation : </p>
        <p><?= $vehicule->plaque_immatriculation ?></p>
      </div>
      <div class="utilisateur__flex">
        <p id="utilisateur_color">Marque : </p>
        <p><?= $vehicule->lib_marque ?></p>
      </div>
    </div>
    <div class="utilisateur__flex">
      <p id="utilisateur_color">Motorisation : </p>
      <p><?= $vehicule->lib_motorisation ?></p>
    </div>
    <div class="utilisateur__flex">
      <p id="utilisateur_color">Type de véhicule : </p>
      <p><?= $vehicule->lib_type ?></p>
    </div>
    <div class="utilisateur__flex">
      <p id="utilisateur_color">Annee : </p>
      <p><?= $vehicule->annee ?></p>
    </div>
    <div class="utilisateur__flex">
      <p id="utilisateur_color">Kilomètre : </p>
      <p><?= $vehicule->km ?></p>
    </div>
    <div class="utilisateur__btn">
      <a href="/compte/supprimerVehicule/<?=$vehicule->id?>" onclick="return confirm('Etes-vous sûre ?');">Supprimer</a>
    </div>
  </div>
</div>
<?php endforeach;   ?>
</div>


