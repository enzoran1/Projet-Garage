<div class="ban" id="ban__messageutilisateur">
    <h1>Mes Annonces</h1>
</div>
<div class="annonces-btn-ajout">
<a href="/Admin/ajoutAnnoncesFrom">Ajout annonces</a>
</div>

<div class="admin-annonces-grid">
<?php foreach($annonces as $annonce) : ?>

 <div class="admin-annonces">
    
    <div class="admin-annonces__container">
        <form enctype="multipart/form-data" action="/admin/ajouterPhoto/<?=$annonce->id?>" method="POST">
           <input class="input-file" type="file" name="photo" id="photo"  accept="image/png, image/jpeg">
          
           <div class="diapo">
           <div class="elements">
           <?php if(isset($photos[$annonce->id])) {
           
           foreach($photos[$annonce->id] as $key => $photo) :?>
             

                       <div class="element <?=$key == 0 ? "active" : ""?>">
                                <img src="<?= $photo->lib_photo ?>" alt="">
                            </div>

             
       
            

            <?php endforeach;
            }?>
            </div>
             <i id="nav-gauche" class="las la-chevron-left"><</i>
             <i id="nav-droite" class="las la-chevron-right">></i>
           </div>
           
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
        </div>
    </div>
</div>


    
<?php endforeach; ?>
</div>
    

