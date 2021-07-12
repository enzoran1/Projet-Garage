<div class="ban" id="ban__messageutilisateur">
    <h1>Mes Annonces</h1>
</div>
<div class="annonces-btn-ajout">
<a href="/Admin/ajoutAnnoncesFrom">Ajout annonces</a>
</div>

<div class="admin-annonces-grid">
<<<<<<< HEAD
    <?php foreach ($annonces as $annonce) : ?>

        <div class="admin-annonces">

            <div class="admin-annonces__container">
                <form enctype="multipart/form-data" action="/admin/ajouterPhoto/<?= $annonce->id ?>" method="POST">
                    <input class="input-file" type="file" name="photo" id="photo" accept="image/png, image/jpeg">
                    <button type="submit">Ajouter photo</button>
                </form>
                <div>
                    <p>Photo : </p>

                    <?php
                    // var_dump($_SESSION);
                    // die();

                    if (file_exists("/image/" . $_SESSION['photo']) && isset($_SESSION['photo'])) {
                    ?>
                        <img src="<?= "/image/" . $_SESSION['photo']; ?>" style="width: 65%" />

                    <?php
                    }
                    ?>

                </div>
                <div class="admin-annonces__content">
                    <p>marque : <?= $annonce->lib_marque ?></p>
                    <p>prix : <?= $annonce->prix ?>€</p>
                </div>
                <div class="admin-annonces__content-description">
                    <p><?= $annonce->description ?></p>
                </div>
                <div class="admin-annonces__content">
                    <p>km : <?= $annonce->km ?>km</p>
                    <p>annee : <?= $annonce->annee ?></p>
                </div>
                <div class="admin-annonces__content">
                    <p>motorisation : <?= $annonce->lib_motorisation ?></p>
                    <p>type : <?= $annonce->lib_type ?></p>
                </div>
                <div class="admin-annonces__content-immatriculation">
                    <p>immatriculation : <?= $annonce->plaque_immatriculation ?></p>
                </div>

                <div class="admin-annonces__btn">
                    <a href="">Modifier</a>
                    <a href="/admin/supprimerAnnonces/<?= $annonce->id ?>">Supprimer</a>
                </div>
            </div>
=======
<?php foreach($annonces as $annonce) : ?>

 <div class="admin-annonces">
    
    <div class="admin-annonces__container">
        <form enctype="multipart/form-data" action="/admin/ajouterPhoto/<?=$annonce->id?>" method="POST">
           <input class="input-file" type="file" name="photo" id="photo"  accept="image/png, image/jpeg">
           <button type="submit">Envoyer photo</button>
        </form>
        <div class="admin-annonces__content">
            <p>marque : <?=$annonce->lib_marque?></p>
            <p>prix : <?=$annonce->prix?>€</p>
        </div>
        <div class="admin-annonces__content-description">
            <p><?=$annonce->description?></p>
        </div>
        <div class="admin-annonces__content">
            <p>km : <?=$annonce->km?>km</p>
            <p>annee : <?=$annonce->annee?></p>
        </div>
        <div class="admin-annonces__content">
            <p>motorisation : <?=$annonce->lib_motorisation?></p>
            <p>type : <?=$annonce->lib_type?></p>
        </div>
        <div class="admin-annonces__content-immatriculation">
            <p>immatriculation : <?=$annonce->plaque_immatriculation?></p>
        </div>

        <div class="admin-annonces__btn">
            <a href="/admin/modifAnnoncesFrom/<?=$annonce->id?>">Modifier</a>
            <a href="/admin/supprimerAnnonces/<?=$annonce->id?>">Supprimer</a>
>>>>>>> enzo
        </div>



    <?php endforeach; ?>
</div>