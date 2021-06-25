<div class="ban" id="ban__inscription">
    <h1>inscription</h1>


</div>


<form action="/Inscription/inscription" class="form2" method="post">
    <div class="form2__container">
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Nom :</label>
                <input type="text" name="nom" id="nom" required minlength="1">
            </div>
            <div class="form2__content">
                <label for="">Prénom :</label>
                <input type="text" name="prenom" id="prenom" required minlength="1">
            </div>
        </div>
        <div class="form2__content">
            <label for="">Adresse :</label>
            <input type="text" name="adresse" id="adresse" require minlength="1">
        </div>
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Téléphone :</label>
                <input type="text" name="tel" id="tel" require maxlength="10" require minlength="10">
            </div>
            <div class="form2__content">
                <label for="">Email :</label>
                <input type="email" name="email" id="email" require minlength="3" require maxlength="64">
            </div>
        </div>
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp">
            </div>
            <div class="form2__content">
                <label for="">Confirmer mot de passe :</label>
                <input type="password" name="mdp2" id="mdp2">
            </div>
        </div>
        

        <div class="form2__btn">
            <button type="submit">Envoyer</button>
        </div>

    </div>
</form>