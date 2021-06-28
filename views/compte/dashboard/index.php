

<div class="ban" id="ban__dashboard">
    <h1>Mon profil</h1>
</div>
<div>

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
                    <a href="/Inscription">Modifier</a>
                    
                    
                </div>
            </div>
        </div>

        






<div class="utilisateur2__véhicule">
          <h3>Ajouter véhicules</h3>
          <button type="submit"><img src="image\icons8-plus-100.png" alt=""></button>
        </div>
</div> 
<div class="utilisateur2__btn">
    <a href="Compte/logout">DECONNEXION</a>
  </div>