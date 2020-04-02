<?php
// 6 - on mets un titre pour afficher un titre dans l'onglet du navigateur

$title = 'recherche';
//16- on crée une variable $cruises car elle est défini seulemnt dans la condition donc on doit la redéfinir
$cruises =[];


//11- on test si les variables GET pour les recherches existe donc condition ensuite on ajoute un model donc on ajoute dans model un fichier cruise.php
if (isset($_GET['destination']) && isset($_GET['date'])) {
    array_map('trim', $_GET); //on retire les espaces

    $cruises = searchCruise($_GET['destination'], $_GET['date']);
   // var_dump($cruises);
}


//7
ob_start();

//8
?>
<h1>Résultat de la recherche</h1>
<!-- 18- afficher une phrase qui affiche le nbre de résultats -->
<?php if (count($cruises) > 0): ?>
<p>Nous avons trouvé <?=count($cruises); ?> résultats(s).</p>
<!-- 19 si on trouve pas -->
<?php else: ?>
<p>Nous n'avons pas trouvé de résultat</p>
<?php endif; ?>

<!-- 17- on affiche le tableau Affichage des résultatsensuite on va sur inscription.php -->
<?php foreach ($cruises as $cruise) : ?>
<div class="card my-2">
    <div class="card-body">
        <h2><?=$cruise['name']; ?></h2>
        <div><?=date_format(date_create($cruise['date_departure']), 'd/m/Y'); ?>
        - <?=date_format(date_create($cruise['date_arrival']), 'd/m/Y'); ?></div>
        <div>Navire: <?=$cruise['boat']; ?></div>
    </div>
</div>
<?php endforeach; ?>


<?php

//9
$content=ob_get_clean();


//10 on mets le lien
require_once '../template.php';