<div class="ban" id="ban__prestation">
    <h1>Prestations</h1>
</div>


   
<div class="admin-prestation__container">
<?php foreach($categories as $categorie) : ?>
<div class="admin-prestation__center">

    <div class="admin-prestation__content">

        <img src="/image/icons8-origin-100.png" alt="">
        <p><?=$categorie->lib_categorie?></p>
        
        <a href="/Prestation/afficherPrestations/<?=$categorie->id?>">Accéder</a>




    </div>
    </div>


<?php endforeach; ?>

</div>
    
