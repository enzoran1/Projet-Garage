<div class="ban" id="ban__inscription">
    <h1>inscription</h1>
</div>


<form action="" method="POST" class="form2">
    <div class="form2__container">
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Nom :</label>
                <span class="erreur" id="erreurNom"></span>
                <input type="text" name="nom" id="nom" onblur="verification()">
                
            </div>
            <div class="form2__content">
                <label for="">Prénom :</label>
                <span class="erreur" id="erreurPrenom"></span>
                <input type="text" name="prenom" id="prenom" onblur="verification()">        
            </div>
        </div>
        <div class="form2__content">
            <label for="">Adresse :</label>
            <span class="erreur" id="erreurAdresse"></span>
            <input type="text" name="adresse" id="adresse" onblur="verification()">  
        </div>
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Téléphone :</label>
                <span class="erreur" id="erreurTel"></span>
                <input type="tel" name="tel" id="tel" onblur="verification()">              
            </div>
            <div class="form2__content">
                <label for="">Email :</label>
                <span class="erreur" id="erreurEmail"></span>
                <input type="email" name="email" id="email" onblur="verification()">   
            </div>
        </div>
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Mot de passe :</label>
                <span class="erreur" id="erreurMdp"></span>
                <input type="password" name="mdp" id="mdp" onblur="verification()">           
            </div>
            <div class="form2__content">
                <label for="">Confirmer mot de passe :</label>
                <span class="erreur" id="erreurMdp2"></span>
                <input type="password" name="mdp2" id="mdp2" onblur="verification()">            
            </div>
        </div>
        <div class="form2__content">
            <label for="">Plaque d'immatriculation :</label>
            <span class="erreur" id="erreurPlaque"></span>
            <input type="text" name="plaque" id="plaque" onblur="verification()"> 
        </div>  
        <div class="form2__btn">
            <button id="envoyer">Envoyer</button>
        </div>
    </div>
</form>
<script>
"use strict";
verification();
function verification()                                 
{		 
    const nom = document.getElementById('nom').value;	
    const prenom = document.getElementById('prenom').value;
    const adresse = document.getElementById('adresse').value;
    const tel = document.getElementById('tel').value;
    const email = document.getElementById('email').value;						
    //var regmdp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{5,}$/;
    const mdp = document.getElementById('mdp').value;
    const mdp2 = document.getElementById('mdp2').value;
    const plaque = document.getElementById('plaque').value;
    
    // nom
    if (nom == ""){ 
        document.getElementById('erreurNom').innerHTML="Vous devez saisir votre nom";  
            
    }else{
        document.getElementById('erreurNom').innerHTML="";
    }
    // prénom   
    if (prenom == ""){ 
        document.getElementById('erreurPrenom').innerHTML="Vous devez saisir votre prénom";  
        
    }else{
        document.getElementById('erreurPrenom').innerHTML="";  
    }
    // adresse
    if (adresse == ""){ 
        document.getElementById('erreurAdresse').innerHTML="Vous devez saisir votre adresse";  
        
    }else{
        document.getElementById('erreurAdresse').innerHTML="";  
    }  
    // tel
    if (tel == ""){ 
        document.getElementById('erreurTel').innerHTML="Vous devez saisir votre numéro de téléphone";  
        
    }else{
        document.getElementById('erreurTel').innerHTML="";  
    }
    // email
    if(email == "") {
        document.getElementById('erreurEmail').innerHTML="Vous devez saisir un email valide";  
         
    }else{
        document.getElementById('erreurEmail').innerHTML="";
    }
    // mdp
    if(mdp == '') {
        document.getElementById('erreurMdp').innerHTML="Vous devez saisir un mot de passe";  

    }else{
        document.getElementById('erreurMdp').innerHTML="";
    }
    //confirmer mdp
    if (mdp2 != mdp){ 
        document.getElementById('erreurMdp2').innerHTML="Les mots de passe ne correcpondent pas";  
         
        }else{
        document.getElementById('erreurMdp2').innerHTML="";  
    }
    //plaque
    if (plaque == ""){ 
        document.getElementById('erreurPlaque').innerHTML="Vous devez saisir votre plaque d'immatriculation";  
         
    }else{
        document.getElementById('erreurPlaque').innerHTML=""; 
         
    }
    if(nom != '' && prenom != '' && adresse != '' && tel != '' && email !='' && mdp !='' && mdp2 !='' && plaque !=' ' )
    {
       document.getElementById('envoyer').onsubmit;
    }
    
}


</script>