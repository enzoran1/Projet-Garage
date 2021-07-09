<div class="ban" id="ban__admin">
<h1>Prestation</h1>
</div>
<div>
    <a href="/Admin/ajoutPrestationsForm">ajout</a>
</div>

<?php foreach($categories as $categorie) : ?>
<div class="admin-prestation__container">

    <div class="admin-prestation__content">

        <img src="/image/admin-message.png" alt="">
        
        <a href="/Admin/prestationsafficher/<?=$categorie->id?>"><?=$categorie->lib_categorie?></a>

    </div>

</div>

<?php endforeach; ?>