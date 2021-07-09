
<?php foreach($categorie as $categories) : ?>
<div class="ban">
<h1><?=$categories->lib_categorie?></h1>
</div>
<?php endforeach;?>




<?php foreach($prestations as $prestation) : ?>
        
        <p><?=$prestation->type?></p>

   
            <p><?=$prestation->prix?>€</p>
        
            <p><?=$prestation->duree?>h</p>
   
<a href="/Admin/modifierPrestaForm/<?=$prestation->id?>">Modifier</a>
<a href="/Admin/supprimerPresta/<?=$prestation->id?>">Supprimer</a>

<?php endforeach;?>
