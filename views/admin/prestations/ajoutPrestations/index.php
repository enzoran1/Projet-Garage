<form action="/Admin/ajoutPrestations" class="form4" method="post">
    <div class="form4__container">
        <div class="form4__flex">
            <div class="form4__content">
                <label for="">Type de prestation :</label>
                <input type="text" name="type" id="type" value="">
            </div>
            <div class="form4__content">
                <label for="">Durée :</label>
                <input type="text" name="duree" id="duree" value="">
            </div> 
        </div>
        <div class="form4__flex">
        <div class="form4__content">
            <label for="">Prix :</label>
            <input type="text" name="prix" id="prix">
        </div>
        </div>
        <div class="form4__flex">
            <div class="form4__content">
                <label for="">Catégorie de la prestation :</label>
                <select name="categorie" id="categorie" class="">
                    <option value="">--Categorie--</option>
                    <?php foreach ($categories as $categorie) { ?>
                        <option value="<?= $categorie->id ?>"><?= $categorie->lib_categorie ?></option>
                    <?php } ?>
                </select>
          </div>
        </div>



        <div class="form4__btn">

        
        <div class="form4__flex-btn">
            <button type="submit">Envoyer</button>
            <a href="/admin">Annuler</a>
            </div>
        </div>
    </div>
</form>