<?php

//boucle for
// tant que i<ou = à 10 et à chaque boucle j'incremente de 1_
for ($i = 1; $i <= 10; ++$i) {
    echo $i . '<br/>';
}

//boucle while
$i = 0;
while ($i < 10) {
    echo $i . '<br/>';
    ++$i;
}

$commande = [
    "produit 1",
    "produit 2",
    "produit 3",
    "produit 4",
];
// pour explorer le tableau on peut faire
//count($commande) retourne le nombre d'éléments dans le tableau
for ($i = 0; $i < count($commande); ++$i) {
    echo $commande[$i] . '<br/>';
}

// Foreach = pour chaque élements du tableau__
foreach ($commande as $produit) {
    echo $produit . '<br/>';
}
$commande = [
    'produit 1' => 'DVD',
    'produit 2' => 'Jeux vidéo',
    'produit 3' => 'Livre',
    'produit 4' => 'Lego',
];

// pour retourner la clé ($key) ou index du tableau
foreach ($commande as $key => $produit) {
    echo $key . ':' . $produit . '<br/>';
}
//Foreach je veux que ma boucle s'arrête au produit 3
foreach ($commande as $key => $produit) {

    if ('DVD' == $produit) {
        continue; // On passe à l'étape suivante (sans éxecuter ce qu'il y a en dessous)
    }
    echo $key . ':' . $produit . '<br/>';

    if ('produit 3' == $key) {
        break; //Arrête la boucle
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3 - Boucles</title>
</head>

<body>

</body>

</html>