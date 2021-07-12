<div class="ban" id="ban__admin">
<h1>Prestations</h1>
</div>
<div class="admin-prestation__btn-modif">
    <a href="/Admin/ajoutPrestationsForm">Ajouter prestations</a>
</div>

<div class="admin-prestation__container">
<?php foreach($categories as $categorie) : ?>
<div class="admin-prestation__center">

    <div class="admin-prestation__content">

        <img src="/image/admin-message.png" alt="">
        
        <a href="/Admin/prestationsafficher/<?=$categorie->id?>"><?=$categorie->lib_categorie?></a>

    </div>
    </div>


<?php endforeach; ?>

</div>