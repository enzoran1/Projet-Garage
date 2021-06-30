<div class="ban" id="ban__listeutilisateur">
    <h1>Liste utilisateurs</h1>
</div>

<div class="test">
    <?php foreach ($utilisateur as $utilisateurs) : ?>
        <div class="carte_utilisateur">
            <div class="carte__utilisateur-container">
                <div class="utilisateur__prenom-nom">
                    <div class="utilisateur__flex">
                        <p id="utilisateur_color">Prenom : </p>
                        <p><?= $utilisateurs->prenom ?></p>
                    </div>
                    <div class="utilisateur__flex">
                        <p id="utilisateur_color">Nom : </p>
                        <p><?= $utilisateurs->nom ?></p>
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
                <div class="utilisateur__btn">
                    <a href="">Modifier</a>
                    <button type="submit">Supprimer</button>
                </div>
            </div>
        </div>

    <?php endforeach;   ?>


</div>