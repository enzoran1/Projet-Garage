
<?php foreach($categorie as $categories) : ?>
<div class="ban" id="ban-prestation-utilisateur2">
<h1><?=$categories->lib_categorie?></h1>
</div>
<?php endforeach;?>




        
        

   

        
           
   




<?php foreach($prestations as $prestation) : ?>
<div class="utilisateur-prestations-container">
<div class="utilisateur-prestations-center">
    <div class="utilisateur-prestations-duree">
    <p><?=$prestation->duree?>H</p>
    </div>

    <div class="utilisateur-prestations-content">
        <div class="utilisateur-prestations-type">
        <p><?=$prestation->type?></p>
        </div>
        <div class="utilisateur-prestations-content-flex">
            <p><?=$prestation->prix?></p>
            <a href="">Ajouter</a>
        </div>
    </div>
    </div>
</div>
<?php endforeach;?>
