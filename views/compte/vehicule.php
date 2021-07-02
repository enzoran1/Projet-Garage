<?php foreach ($vehicules as $vehicule) : ?>
    <p>Plaque d'immatriculation : </p>
    <p><?= $vehicule->plaque_immatriculation ?></p>
    <p>Marque : </p>
    <p><?= $vehicule->nom ?></p>
    <p>Motorisation : </p>
    <p><?= $vehicule->lib_motorisation ?></p>
    <p>Type de véhicule : </p>
    <p><?= $vehicule->lib_type ?></p>
    <p>Annee : </p>
    <p><?= $vehicule->annee ?></p>
    <p>Kilomètre : </p>
    <p><?= $vehicule->km ?></p>
    <?php endforeach;   ?>