<?php foreach($categorie as $categories) : ?>
<div class="ban">
<h1><?=$categories->lib_categorie?></h1>
</div>
<?php endforeach;?>



<div class="prestation-grid-afficher">

<?php foreach($prestations as $prestation) : ?>
    <div class="prestation-grid-center">
<div class="admin-prestation-container__afficher">
<div class="admin-prestation-content__afficher">
    <div class="admin-prestation__afficher-type">
        <p id="admin-prestation__color-titre">Type de prestation</p>
        <p><?=$prestation->type?></p>
    </div>
    <div class="admin-prestation__afficher">
        <div class="admin-prestation__afficher-flex">
            <p id="admin-prestation__color-titre">Prix : </p>
            <p><?=$prestation->prix?>€</p>
        </div>
        <div class="admin-prestation__afficher-flex">
            <p id="admin-prestation__color-titre">Durée : </p>
            <p><?=$prestation->duree?>h</p>
        </div>
    </div>
</div>
<div class="admin-prestation__afficher-btn">
<a href="/Admin/modifierPrestaForm/<?=$prestation->id?>">Modifier</a>
<a href="/Admin/supprimerPresta/<?=$prestation->id?>">Supprimer</a>
</div>
</div>
</div>
<?php endforeach;?>
</div>