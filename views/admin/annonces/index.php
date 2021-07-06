
<a href="/Admin/ajoutAnnoncesFrom">ajout</a>
<br>

<?php
var_dump($annonces);

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
}
