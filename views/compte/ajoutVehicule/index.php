<div class="ban" id="ban__inscription">

    <h1>Ajout véhicule</h1>

</div>


<form action="" class="form2" method="post">
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
                <select name="marque" id="marque" onclick="ajaxModele()">
                    <option value="">--Marques--</option>
                    <?php foreach ($marques as $marque) { ?>
                        <option value="<?= $marque->id ?>"><?= $marque->nom ?></option>
                    <?php } ?>
                </select>
            </div>


            <div class="form2__content">
                <label for="">Modéle :</label>
                <select name="modele" id="modele">
                    <option value="">--Choisisez une marque avant le modèle--</option>
                </select>
            </div>

            <div class="form2__content">
                <label for="">Motorisation :</label>
                <select name="motorisation" id="motorisation">
                    <option value="">--Motorisation--</option>
                    <?php foreach ($motorisations as $motorisation) { ?>
                        <option value="<?= $motorisation->id_motorisation ?>"><?= $motorisation->lib_motorisation ?></option>
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
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
</script>
  
<script>
    function ajaxModele()
    {
        let marque = $('#marque').val();
        $.ajax(
        {
            url : '/reqAjax',
            type : 'post',
            data : {'marque':marque},

            success:function(retourRes)
            {
            $('#modele').html(retourRes);
            }
        }
        );
    }
</script>