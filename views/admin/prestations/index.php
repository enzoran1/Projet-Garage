<h1>Mes prestations</h1>

<a href="/Admin/ajoutPrestationsForm">Ajouter</a>

<?php foreach($prestations as $prestation)
{ ?>
    <div class="prestation-container"> 
        <div class="prestation-content">
            <?= '<h2>'.$prestation->type. '</h2>' ?>
        </div>
        <div class="prestation-content">
            <?= 'Prix : '.$prestation->prix?>
        </div>
        <div class="prestation-content">
            <?='Durée : '. $prestation->duree?>
        </div>
    </div>
<?php } ?>