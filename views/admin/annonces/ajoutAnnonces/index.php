<form action="/Admin/ajoutAnnonces/index" class="form4" method="post">
    <div class="form4__container">
        <div class="form4__flex">
            <div class="form4__content">
                <label for="">Année :</label>
                <input type="text" name="annee" id="annee" value="">
            </div>
            <div class="form4__content">
                <label for="">Kilométres :</label>
                <input type="text" name="km" id="km" value="">
            </div>
           
        </div>
        <div class="form4__flex">
        <div class="form4__content">
            <label for="">Plaque d'immatriculation :</label>
            <input type="text" name="plaque_immatriculation" id="plaque_immatriculation">
          
        </div>
        <div class="form4__content">
                <label for="">prix :</label>
                <input type="text" name="prix" id="prix" value="">
            </div>
            </div>
        <div class="form4__content">
            <label for="">Déscription :</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form4__flex">
            <div class="form4__content">
                <label for="">Marque :</label>
                <select name="id_marque" id="id_marque" class="marques">
                    <option value="">--Marques--</option>
                    <?php foreach ($marques as $marque) { ?>
                        <option value="<?= $marque->id ?>"><?= $marque->lib_marque ?></option>
                    <?php } ?>
                </select>
            </div>


            

            <div class="form4__content">
                <label for="">Motorisation :</label>
                <select name="id_motorisation" id="id_motorisation">
                    <option value="">--Motorisation--</option>
                    <?php foreach ($motorisations as $motorisation) { ?>
                        <option value="<?= $motorisation->id?>"><?= $motorisation->lib_motorisation ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form4__content">
                <label for="">Type véhicule :</label>
                <select name="id_type" id="id_type">
                    <option value="">--Type véhicules--</option>
                    <?php foreach ($types as $type) { ?>
                        <option value="<?= $type->id_type ?>"><?= $type->lib_type ?></option>
                    <?php } ?>
                </select>
            </div>



        </div>



        <div class="form4__btn">

        
        <div class="form4__flex-btn">
            <button type="submit">Envoyer</button>
            <a href="/compte">Annuler</a>
            </div>
        </div>
    </div>
</form>