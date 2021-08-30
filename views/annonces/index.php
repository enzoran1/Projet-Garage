<div class="ban" id="ban__messageutilisateur">
    <h1>Nos véhicules</h1>
</div>

<div class="achat-vehicule-grid">

<?php foreach($annonces as $annonce) : ?>
    <div class="achat-vehicule-center">
        <div class="achat-vehicule-container">
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
            <div class="achat-vehicule-content">
                <div class="achat-vehicule-content-marque-prix">
                    <p><?=$annonce->lib_marque?></p>
                    <p><?=$annonce->prix?>€</p>
                </div>
                <div class="achat-vehicule-content-type">
                    <p><?=$annonce->lib_type?></p>
                </div>
                <div class="achat-vehicule-content-description">
                    <p><?=$annonce->description?></p>
                </div>
                <div class="achat-vehicule-content-km-annee-motorisation">
                    <p><?=$annonce->km?>km</p>
                    <p><?=$annonce->annee?></p>
                    <p><?=$annonce->lib_motorisation?></p>
                </div>
                <div class="achat-vehicule-btn">
                    <a href="">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>  
<?php endforeach; ?>
</div>

    
