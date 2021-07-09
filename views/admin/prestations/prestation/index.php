<?php foreach($categorie as $categories) : ?>
<h1><?=$categories->lib_categorie?></h1>
<?php endforeach;?>
<?php foreach($prestations as $prestation) : ?>
<p>Type de prestation : <?=$prestation->type?></p>
<p>Prix : <?=$prestation->prix?></p>
<p>Durée : <?=$prestation->duree?></p>
<a href="/Admin/modifierPrestaForm/<?=$prestation->id?>">Modifier</a>
<a href="/Admin/supprimerPresta/<?=$prestation->id?>">Supprimer</a>
<?php endforeach;?>