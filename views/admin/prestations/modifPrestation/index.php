<?php foreach($prestations as $prestation)?>
<form action="/Admin/modifierPresta/<?=$prestation->id?>" class="form4" method="post">
    <div class="form4__container">
        <div class="form4__flex">
            <div class="form4__content">
                <label for="">Type de prestation :</label>
                <input type="text" name="type" id="type" value="<?=$prestation->type?>">
            </div>
            <div class="form4__content">
                <label for="">Durée :</label>
                <input type="text" name="duree" id="duree" value=" <?=$prestation->duree?>">
            </div> 
        </div>
        <div class="form4__flex">
        <div class="form4__content">
            <label for="">Prix :</label>
            <input type="text" name="prix" id="prix" value=" <?=$prestation->prix?>">
        </div>
        </div>
        <div class="form4__flex">
            <div class="form4__content">
                <label for="">Catégorie de la prestation :</label>
                <select name="categorie" id="categorie" class="">
                    <option value=" <?=$prestation->id_categorie?>"> <?=$prestation->lib_categorie?></option>
                    <?php foreach ($categories as $categorie) { ?>
                        <option value="<?= $categorie->id ?>"><?= $categorie->lib_categorie ?></option>
                    <?php } ?>
                </select>
          </div>
        </div>



        <div class="form4__btn">

        
        <div class="form4__flex-btn">
            <button type="submit">Envoyer</button>
            <a href="/admin/prestations">Annuler</a>
            </div>
        </div>
    </div>
</form>