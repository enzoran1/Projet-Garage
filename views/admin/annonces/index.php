<div class="ban" id="ban__messageutilisateur">
    <h1>Mes Annonces</h1>
</div>
<a href="/Admin/ajoutAnnoncesFrom">ajout</a>

<div class="admin-annonces-grid">
<?php foreach($annonces as $annonce) : ?>

 <div class="admin-annonces">
    
    <div class="admin-annonces__container">
        <form enctype="multipart/form-data" action="/admin/ajouterPhoto/<?=$annonce->id?>" method="POST">
           <input class="input-file" type="file" name="photo" id="photo"  accept="image/png, image/jpeg">
<<<<<<< HEAD
           <button type="submit">Enregistrer photo</button>
=======
           <button type="submit">Envoyer photo</button>
>>>>>>> enzo
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
        </div>
    </div>
</div>


    
<?php endforeach; ?>
</div>
    

