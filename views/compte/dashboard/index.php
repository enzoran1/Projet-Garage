

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
                    <a id="affiche-modal" href="#">Modifier</a>
                    
                </div>
                </div>
        </div>
<div id="modal-pub" class="modal hidden">
        <div class="conteneur-modal">
            <div class="close">&times;</div>

            <span class="titre-modal">Achête mon choco !</span>
        </div>
    </div>
        


        






<div class="utilisateur2__véhicule">
          <h3>Ajouter véhicules</h3>
          <a href=""><img src="image\icons8-plus-100.png" alt=""></a>
          
</div> 
<div class="utilisateur2__btn">
    <a href="Compte/logout">DECONNEXION</a>
  </div>