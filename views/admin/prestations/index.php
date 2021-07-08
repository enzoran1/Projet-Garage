

<h1>Mes prestations</h1>

<a href="/Admin/ajoutPrestationsForm">Ajouter</a>

<div>
<?php foreach($categories as $categorie) :?>

<div>
    <h2><?= $categorie->lib_categorie?></h2>
</div>

<?php foreach($prestations as $prestation) :?>

<div>
    <p><?=$prestation->type?></p>
    <p><?=$prestation->prix?></p>
    <p><?=$prestation->duree?></p>
</div>

<div>
    <a href="">Modifer</a>
    <a href="">Supprimer</a>
</div>

</div>



<?php endforeach;?>
<?php endforeach;?>