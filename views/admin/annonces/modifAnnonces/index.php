<?php foreach($annonces as $annonce)?>

<form action="/Admin/modifAnnonces/<?=$annonce->id?>" class="form4" method="post">
    <div class="form4__container">
        <div class="form4__flex">
            <div class="form4__content">
                <label for="">Année :</label>
                <input type="text" name="annee" id="annee" value="<?=$annonce->annee?>">
            </div>
            <div class="form4__content">
                <label for="">Kilométres :</label>
                <input type="text" name="km" id="km" value="<?=$annonce->km?>">
            </div>
           
        </div>
        <div class="form4__flex">
        <div class="form4__content">
            <label for="">Plaque d'immatriculation :</label>
            <input type="text" name="plaque_immatriculation" id="plaque_immatriculation" value="<?=$annonce->plaque_immatriculation?>">
          
        </div>
        <div class="form4__content">
                <label for="">prix :</label>
                <input type="text" name="prix" id="prix" value="<?=$annonce->prix?>">
            </div>
            </div>
        <div class="form4__content">
            <label for="">Description :</label>
            <textarea name="description" id="" cols="30" rows="10" ><?=$annonce->description?></textarea>
        </div>
        <div class="form4__flex">
            <div class="form4__content">
                <label for="">Marque :</label>
                <select name="marque" id="id_marque" class="marques">
                    <option value="<?=$annonce->id_marque?>"><?=$annonce->lib_marque?></option>
                    <?php foreach ($marques as $marque) { ?>
                        <option value="<?=$marque->id?>"><?=$marque->lib_marque?></option>
                    <?php } ?>
                </select>
            </div>


            

            <div class="form4__content">
                <label for="">Motorisation :</label>
                <select name="motorisation" id="id_motorisation">
                    <option value="<?=$annonce->id_motorisation?>"><?=$annonce->lib_motorisation?></option>
                    <?php foreach ($motorisations as $motorisation) { ?>
                        <option value="<?=$motorisation->id?>"><?=$motorisation->lib_motorisation?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form4__content">
                <label for="">Type véhicule :</label>
                <select name="id_type" id="id_type">
                    <option value="<?=$annonce->id_type?>"><?=$annonce->lib_type?></option>
                    <?php foreach ($types as $type) { ?>
                        <option value="<?=$type->id_type?>"><?=$type->lib_type?></option>
                    <?php } ?>
                </select>
            </div>



        </div>



        <div class="form4__btn">

        
        <div class="form4__flex-btn">
            <button type="submit">Envoyer</button>
            <a href="/admin/annonces">Annuler</a>
            </div>
        </div>
    </div>
</form>

