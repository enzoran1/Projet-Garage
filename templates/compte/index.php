
    <div class="ban" id="ban__compte">
        <h1>Mon Compte</h1>
        

    </div>


<div class="compte-titre">
    <h2>Veuillez-vous<br>connecter</h2>
</div>


<form action="" method="POST" class="form">
<div class="form__container">
    <div class="form__content">
        <label for="">Votre email :</label>
        <span class="erreur" id="erreurEmail"></span>
        <input type="text" name="email" id="email" onblur="verifchamp()">
    </div>
    <div class="form__content">
        <label for="">Votre mot de passe :</label>
        <span class="erreur" id="erreurMdp"></span>
        <input type="password" name="mdp" id="mdp" onblur="verifchamp()">
    </div>
<div class="form__btn">
    <button type="submit">Connexion</button>
</div>
<div class="form__inscription">
    <a href="/inscription">Pas de compte inscrivez-vous</a>
</div>
</div>
</form>
<script>
  verifchamp()
  function verifchamp()
  {
    const email = document.getElementById('email').value;
    const mdp = document.getElementById('mdp').value
    
    if(email == "") {
        document.getElementById('erreurEmail').innerHTML="Vous devez saisir un email valide";  
         
    }else{
        document.getElementById('erreurEmail').innerHTML="";
    }
    if(mdp == '') {
        document.getElementById('erreurMdp').innerHTML="Vous devez saisir un mot de passe";  

    }else{
        document.getElementById('erreurMdp').innerHTML="";
    }
  }
</script>