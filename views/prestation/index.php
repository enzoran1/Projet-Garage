<div class="ban" id="ban__prestation">
        <h1>Prestations</h1>
        

    </div>


   
    <div class="admin-prestation__container">
<?php foreach($categories as $categorie) : ?>
<div class="admin-prestation__center">

    <div class="admin-prestation__content">

        <img src="/image/admin-message.png" alt="">
        
        <a href="/Prestation/afficherPrestations/<?=$categorie->id?>"><?=$categorie->lib_categorie?></a>




    </div>
    </div>


<?php endforeach; ?>

</div>
    
