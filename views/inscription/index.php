<div class="ban" id="ban__inscription">
    <?php if(isset($_SESSION['user']['prenom'])&& $_SESSION['user']['role'] === 'ROLE_USER'){ ?>
        <h1>Modifier votre profil</h1>
    <?php } ?>
    
    <?php if(!isset($_SESSION['user']['prenom'])){ ?>
        <h1>Inscription</h1>
    <?php } ?>   
</div>


<form action="<?= isset($_SESSION['user']['prenom']) ? '/Compte/modifierProfil' : '/Inscription/inscription'?>" class="form2" method="post">
    <div class="form2__container">
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Nom :</label>
                <input type="text" name="nom" id="nom" <?php if(isset($_SESSION['user']['prenom'])&& $_SESSION['user']['role'] === 'ROLE_USER'){ ?> value="<?=$_SESSION['user']['nom']?>"<?php } ?> 
                 required minlength="1">
            </div>
            <div class="form2__content">
                <label for="">Prénom :</label>
                <input type="text" name="prenom" id="prenom" <?php if(isset($_SESSION['user']['prenom'])&& $_SESSION['user']['role'] === 'ROLE_USER'){ ?> value="<?=$_SESSION['user']['prenom']?>"<?php } ?> required minlength="1">
            </div>
        </div>
        <div class="form2__content">
            <label for="">Adresse :</label>
            <input type="text" name="adresse" id="adresse" <?php if(isset($_SESSION['user']['prenom'])&& $_SESSION['user']['role'] === 'ROLE_USER'){ ?> value="<?=$_SESSION['user']['adresse']?>"<?php } ?> require minlength="1">
        </div>
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Téléphone :</label>
                <input type="text" name="tel" id="tel" require maxlength="10" <?php if(isset($_SESSION['user']['prenom'])&& $_SESSION['user']['role'] === 'ROLE_USER'){ ?> value="<?=$_SESSION['user']['tel']?>"<?php } ?> require minlength="10">
            </div>
            <div class="form2__content">
                <label for="">Email :</label>
                <input type="email" name="email" id="email" require minlength="3" <?php if(isset($_SESSION['user']['prenom'])&& $_SESSION['user']['role'] === 'ROLE_USER'){ ?> value="<?=$_SESSION['user']['email']?>"<?php } ?> require maxlength="64">
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
            

            <?php if(!isset($_SESSION['user']['prenom'])){ ?>
                <button type="submit">Envoyer</button>
            <?php } ?>    
        </div>
   

    </div>
    <div class="form2__modifs">
            <?php if(isset($_SESSION['user']['prenom'])){ ?>
                <button type="submit">Mettre à jour</button>
                <a href="/compte">Annuler</a>
            <?php } ?>
            </div>
</form>