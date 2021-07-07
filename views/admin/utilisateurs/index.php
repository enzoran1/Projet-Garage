<div class="ban" id="ban__listeutilisateur">
    <h1>Liste utilisateurs</h1>
</div>


<div class="test">
    <?php foreach ($utilisateur as $utilisateurs) : ?>
        <div class="carte_utilisateur">
            <div class="carte__utilisateur-container">
                <div class="utilisateur__prenom-nom">
                    <div class="utilisateur__flex">
                        <p id="utilisateur_color">Nom : </p>
                        <p><?= $utilisateurs->nom ?></p>
                    </div>
                    <div class="utilisateur__flex">
                        <p id="utilisateur_color">Prenom : </p>
                        <p><?= $utilisateurs->prenom ?></p>
                    </div>  
                </div>
                <div class="utilisateur__flex">
                    <p id="utilisateur_color">Email : </p>
                    <p><?= $utilisateurs->email ?></p>
                </div>
                <div class="utilisateur__flex">
                    <p id="utilisateur_color">Adresse : </p>
                    <p><?= $utilisateurs->adresse ?></p>
                </div>
                <div class="utilisateur__flex">
                    <p id="utilisateur_color">Tel : </p>
                    <p><?= $utilisateurs->tel ?></p>
                </div>
                <div class="utilisateur__flex">
                    <p id="utilisateur_color">Date creation : </p>
                    <p><?= $utilisateurs->date_creation ?></p>
                </div>
                <h2>Véhicule(s)</h2>
                <div class="utilisateur__flex">
                    <p id="utilisateur_color">Marque : </p>
                    <p><?= $utilisateurs->lib_marque ?></p>
                </div>
                <div class="utilisateur__flex">
                    <p id="utilisateur_color">Motorisation : </p>
                    <p><?= $utilisateurs->lib_motorisation ?></p>
                </div>
                <div class="utilisateur__flex">
                    <p id="utilisateur_color">Type de véhicule : </p>
                    <p><?= $utilisateurs->lib_type ?></p>
                </div>
                <div class="utilisateur__flex">
                    <p id="utilisateur_color">Plaque d'immatriculation : </p>
                    <p><?= $utilisateurs->plaque_immatriculation ?></p>
                </div>
                <div class="utilisateur__flex">
                    <p id="utilisateur_color">Annee : </p>
                    <p><?= $utilisateurs->annee ?></p>
                </div>
                <div class="utilisateur__flex">
                    <p id="utilisateur_color">km : </p>
                    <p><?= $utilisateurs->km ?></p>
                </div>

                <div class="utilisateur__btn">
                    <a href="/admin/modifClientForm/<?=$utilisateurs->id?>">Modifier</a>
                    <a href="/admin/supprimerUtilisateur/<?=$utilisateurs->id?>" onclick="return confirm('Etes-vous sûre ?');">Supprimer</a>
                </div>
            </div>
        </div>

    <?php endforeach;   ?>


</div>