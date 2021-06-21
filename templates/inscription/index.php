<div class="ban" id="ban__inscription">
    <h1>inscription</h1>
</div>


<form action="post" class="form2">
    <div class="form2__container">
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Nom :</label>
                <input type="text" name="nom" id="nom">
            </div>
            <div class="form2__content">
                <label for="">Prénom :</label>
                <input type="text" name="prenom" id="prenom">
            </div>
        </div>
        <div class="form2__content">
            <label for="">Adresse :</label>
            <input type="text" name="adresse" id="adresse">
        </div>
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Téléphone :</label>
                <input type="tel" name="tel" id="tel">
            </div>
            <div class="form2__content">
                <label for="">Email :</label>
                <input type="email" name="email" id="email">
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
        <div class="form2__content">
            <label for="">Plaque d'immatriculation :</label>
            <input type="text" name="plaque" id="plaque">
        </div>  
        <div class="form2__btn">
            <button type="submit" onclick="verification()">Envoyer</button>
        </div>
    </div>
</form>