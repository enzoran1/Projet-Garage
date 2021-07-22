
<?php foreach($categorie as $categories) : ?>
<div class="ban" id="ban-prestation-utilisateur2">
<h1><?=$categories->lib_categorie?></h1>
</div>
<?php endforeach;?>
<div class="prestation-utilisateur-grid">
<?php foreach($prestations as $prestation) :?>
    <div>
    <div class="carte__prestation-center">
    <div class="carte__prestation-utilisateur">

        <div class="prestation-utilisateur-duree">
            <p><?= $prestation->duree?>"</p>
        </div>

        <div class="prestation-utilisateur-type-prix">
            <p><?= $prestation->type?></p>

            <div class="prestation-utilisateur-prix-btn">
                <p><?= $prestation->prix?>€</p>
                <a href="">Ajouter</a>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php endforeach;?>
</div>