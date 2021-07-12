
<h1>Modifier le profil du client</h1>
  
<?php foreach($utilisateurs as $utilisateur)?>

<form action="/Admin/modifierProfiladmin/<?=$utilisateur->id?>" class="form2" method="post">
  <div class="form2__container">
    <div class="form2__flex">
      <div class="form2__content">
          <label for="">Nom :</label>
          <input type="text" name="nom" id="nom"  value="<?=$utilisateur->nom?>" 
            required minlength="1">
      </div>
      <div class="form2__content">
          <label for="">Prénom :</label>
          <input type="text" name="prenom" id="prenom" value="<?=$utilisateur->prenom?>" required minlength="1">
      </div>
    </div>
    <div class="form2__content">
        <label for="">Adresse :</label>
        <input type="text" name="adresse" id="adresse" value="<?=$utilisateur->adresse?>" require minlength="1">
    </div>
    <div class="form2__flex">
      <div class="form2__content">
          <label for="">Téléphone :</label>
          <input type="text" name="tel" id="tel" require maxlength="10" value="<?=$utilisateur->tel?>" require minlength="10">
      </div>
      <div class="form2__content">
          <label for="">Email :</label>
          <input type="email" name="email" id="email" require minlength="3" value="<?=$utilisateur->email?>" require maxlength="64">
      </div>
    </div>
  </div>
  <div class="form2__modifs">          
    <button type="submit">Mettre à jour</button>
    <a href="/admin/utilisateurs">Annuler</a>
  </div>
</form>