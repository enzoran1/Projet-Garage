<div class="ban" id="ban__inscription">

    <h1>Ajout véhicule</h1>

</div>


<form action="/Compte/ajoutVehicule" class="form2" method="post">
    <div class="form2__container">
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Année :</label>
                <input type="text" name="annee" id="annee" value="">
            </div>
            <div class="form2__content">
                <label for="">Kilométres :</label>
                <input type="text" name="km" id="km" value="">
            </div>
        </div>
        <div class="form2__content">
            <label for="">Plaque d'immatriculation :</label>
            <input type="text" name="plaque_immatriculation" id="plaque_immatriculation">
        </div>
        <div class="form2__flex">
            <div class="form2__content">
                <label for="">Marque :</label>
                <select name="marque" id="marque" onchange="ajaxModele()">
                    <option value="">--Marques--</option>
                    <?php foreach ($marques as $marque) { ?>
                        <option value="<?= $marque->id ?>"><?= $marque->nom ?></option>
                    <?php } ?>
                </select>
            </div>


            <div class="form2__content">
                <label for="">Modéle :</label>
                <select name="modele" id="modele">
                    <option value="">--Modèle--</option>
                </select>
            </div>

            <div class="form2__content">
                <label for="">Motorisation :</label>
                <select name="motorisation" id="motorisation">
                    <option value="">--Motorisation--</option>
                    <?php foreach ($motorisations as $motorisation) { ?>
                        <option value="<?= $motorisation->id?>"><?= $motorisation->lib_motorisation ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form2__content">
                <label for="">Type véhicule :</label>
                <select name="type_vehicule" id="type_vehicule">
                    <option value="">--Type véhicules--</option>
                    <?php foreach ($types as $type) { ?>
                        <option value="<?= $type->id_type ?>"><?= $type->lib_type ?></option>
                    <?php } ?>
                </select>
            </div>



        </div>



        <div class="form2__btn">



            <button type="submit">Envoyer</button>
        </div>

    </div>
</form>

  
