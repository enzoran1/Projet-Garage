<div class="ban" id="ban__inscription">
    <?php if(isset($_SESSION['user']['prenom'])){ ?>
        <h1>Modifier votre profil</h1>
    <?php } ?>

    <?php if(!isset($_SESSION['user']['prenom'])){ ?>
        <h1>Inscription</h1>
    <?php } ?>   
</div>


<form action="<?= isset($_SESSION['user']['prenom']) ? '/' : '/Inscription/inscription'?>" class="form2" method="post">
    <div class="form2__container">
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Nom :</label>
                <input type="text" name="nom" id="nom" value="" required minlength="1">
            </div>
            <div class="form2__content">
                <label for="">Prénom :</label>
                <input type="text" name="prenom" id="prenom" value="" required minlength="1">
            </div>
        </div>
        <div class="form2__content">
            <label for="">Adresse :</label>
            <input type="text" name="adresse" id="adresse"value="" require minlength="1">
        </div>
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Téléphone :</label>
                <input type="text" name="tel" id="tel" require maxlength="10" value="" require minlength="10">
            </div>
            <div class="form2__content">
                <label for="">Email :</label>
                <input type="email" name="email" id="email" require minlength="3" value="" require maxlength="64">
            </div>
        </div>
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp" value="">
            </div>
            <div class="form2__content">
                <label for="">Confirmer mot de passe :</label>
                <input type="password" name="mdp2" id="mdp2" value="">
            </div>
        </div>
        

        <div class="form2__btn">
            <?php if(isset($_SESSION['user']['prenom'])){ ?>
                <button type="submit">Mettre à jour</button>
                <a href="/compte">Annuler</a>
            <?php } ?>

            <?php if(!isset($_SESSION['user']['prenom'])){ ?>
                <button type="submit">Envoyer</button>
            <?php } ?>    
        </div>

    </div>
</form>