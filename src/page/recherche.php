<?php
// 6 - on mets un titre pour afficher un titre dans l'onglet du navigateur

$title = 'recherche';

//11- on test si les variables GET pour les recherches existe donc condition ensuite on ajoute un model donc on ajoute dans model un fichier cruise.php
if (isset($_GET['destination']) && isset isset($_GET['date'])) {
    array_map('trim', $_GET); //on retire les espaces

    $cruise = searchCruise($_GET['date'], $_GET['destination']);
}


//7
ob_start();

//8
?>
<h1>Résultat de la recherche</h1>
<?php

//9
$content=ob_get_clean();


//10 on mets le lien
require_once '../template.php';