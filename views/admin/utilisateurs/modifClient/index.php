
<h1>Modifier le profil du client</h1>
    
<?php var_dump($utilisateurs); ?>
<form action="" class="form2" method="post">
  <div class="form2__container">
    <div class="form2__flex">
      <div class="form2__content">
          <label for="">Nom :</label>
          <input type="text" name="nom" id="nom"  value="<?=$utilisateurs->nom?>" 
            required minlength="1">
      </div>
      <div class="form2__content">
          <label for="">Prénom :</label>
          <input type="text" name="prenom" id="prenom" value="<?=$utilisateurs->prenom?>" required minlength="1">
      </div>
    </div>
    <div class="form2__content">
        <label for="">Adresse :</label>
        <input type="text" name="adresse" id="adresse" value="<?=$utilisateurs->adresse?>" require minlength="1">
    </div>
    <div class="form2__flex">
      <div class="form2__content">
          <label for="">Téléphone :</label>
          <input type="text" name="tel" id="tel" require maxlength="10" value="<?=$utilisateurs->tel?>" require minlength="10">
      </div>
      <div class="form2__content">
          <label for="">Email :</label>
          <input type="email" name="email" id="email" require minlength="3" value="<?=$utilisateurs->email?>" require maxlength="64">
      </div>
    </div>
    <div class="form2__flex">
      <div class="form2__content">
        <label for="">Marque :</label>
        <select name="id_marque" id="id_marque" class="marques">
          <option value="<?=$utilisateurs->marque?>"></option>
            <?php foreach ($marques as $marque) { ?>
              <option value="<?= $marque->id ?>"><?= $marque->lib_marque ?></option>
            <?php } ?>
        </select>
      </div>
        <div class="form2__content">
            <label for="">Motorisation :</label>
            <select name="id_motorisation" id="id_motorisation">
                <option value="">--Motorisation--</option>
                <?php foreach ($motorisations as $motorisation) { ?>
                    <option value="<?= $motorisation->id?>"><?= $motorisation->lib_motorisation ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form2__content">
            <label for="">Type véhicule :</label>
            <select name="id_type" id="id_type">
                <option value="">--Type véhicules--</option>
                <?php foreach ($types as $type) { ?>
                    <option value="<?= $type->id_type ?>"><?= $type->lib_type ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
  </div>
  <div class="form2__modifs">          
    <button type="submit">Mettre à jour</button>
    <a href="/admin/utilisateurs">Annuler</a>
  </div>
</form>