
<a href="/Admin/ajoutAnnoncesFrom">ajout</a>
<br>

<?php

foreach($annonces as $annonce)
{ 
    echo 
    
    $annonce->id. '</br>',
    $annonce->prix. '</br>', 
    $annonce->description. '</br>', 
    $annonce->plaque_immatriculation. '</br>',
    $annonce->annee. '</br>',
    $annonce->km. '</br>',
    $annonce->lib_motorisation. '</br>',
    $annonce->lib_type. '</br>',
    $annonce->lib_marque. '</br>';
    echo '<br>';

    ?>
    <form enctype="multipart/form-data" action="/admin/ajouterPhoto/<?=$annonce->id?>" method="POST">
        <input type="file" name="photo" id="photo"  accept="image/png, image/jpeg">
        <button type="submit">Ajouter photo</button>
    </form>
    
    
<?php
}?>

