<div class="ban" id="ban__dashboard">
    <h1>Mon profil</h1>
</div>

<div class="utilisateur2__flex-container">

    <div class="carte_utilisateur2">
        <div class="utilisateur2__titre">
            <h3>Mes information</h3>
        </div>

        <div class="carte__utilisateur2-container">
            <div class="utilisateur2__flex-paire">
                <div class="utilisateur2__flex">
                    <p id="utilisateur2_color">Prenom : </p>
                    <p><?= $_SESSION['user']['prenom'] ?></p>
                </div>
                <div class="utilisateur2__flex">
                    <p id="utilisateur2_color">Nom : </p>
                    <p><?= $_SESSION['user']['nom'] ?></p>
                </div>
            </div>
            <div class="utilisateur2__flex-paire">
                <div class="utilisateur2__flex">
                    <p id="utilisateur2_color">Email : </p>
                    <p><?= $_SESSION['user']['email'] ?></p>
                </div>
                <div class="utilisateur2__flex">
                    <p id="utilisateur2_color">Adresse : </p>
                    <p><?= $_SESSION['user']['adresse'] ?></p>
                </div>
            </div>

            <div class="utilisateur2__flex">
                <p id="utilisateur2_color">Tel : </p>
                <p><?= $_SESSION['user']['tel'] ?></p>
            </div>


            <div class="utilisateur2__btn">
                <a id="affiche-modal" onclick="modal()">Modifier</a>
            </div>
        </div>
    </div>

    <div id="modal-pub" class="modal hidden">
        <div class="conteneur-modal">
            <div class="close">&times; </div>
            <form class="form__modal" action="/compte/editProfileView" method="post">
                <div class="modal__content">
                    <label for="">mot de passe</label>
                    <input type="password" name="password1" id="password1">
                </div>
                <div class="modal__content">
                    <label for="">Confirmer votre mot de passe </label>
                    <input type="password" name="password2" id="password2">
                </div>
                <div class="modal__btn">
                    <button type="submit" id="submitpasswordmodal">Envoyer</button>
                </div>
            </form>
        </div>
    </div>

    <div class="utilisateur2__vehicule">
        <h3>Ajout de véhicules</h3>


        <a href="compte/ajoutVehicule"><img src="image\icons8-plus-100.png" alt=""></a>
        <div class="utilisateur2__liste-vehicule">
            <h3>Ma liste de véhicules</h3>
            <a href="compte/afficheVehiculesUtil">voir</a>
        </div>
    </div>
</div>

<div class="utilisateur2__btn">
    <a id="utilisateur2__btn-color" href="Compte/logout">Deconnexion</a>
</div>