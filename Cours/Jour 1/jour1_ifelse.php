<?php

//Condition
$estAdmin = true;

if ($estAdmin) {
    echo 'vous êtes admin !';
} elseif ($testAdmin) {
    echo "vous n'êtes pas admin !";
} else {
    echo "Ne s'affichera jamais";
}
//on peut aussi faire elseif____
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>2 - Les conditions</title>
</head>

<body>
    <!-- <?php if ($estAdmin) { ?>
        <a href="#"> Administration</a>
    <?php } ?>

    <br /> -->
    <!-- 2ème Méthode et meilleur -->
    <?php if ($estAdmin) : ?>
        <a href="#"> Administration</a>
    <?php endif; ?>
    <hr />
    <?php
    $a = 15;
    $b = 30;

    if ($a == $b) {
        echo 'ce sont les mêmes valeurs';
    }

    // yoda condition
    if (15 == $a) {
    }

    if ($a >= $b) {
        echo 'a est plus grand ou égal à b';
    } else {
        echo 'a est plus petit que b';
    }

    //égalité chaîne
    $compte = 'admin';
    if ('admin' == $compte) {
    }

    //Différent
    if ($a != $b) {
    }

    /*
    == test d'égalité
    === identique (strictement égale) si les valeur sont égales et si elles sont du même type */

    if ($compte == true) { // $compte !=
        echo '<br/>la chaîne est vraie';
    }

    if (true === $compte) {
        echo 'Même type';
    }
    ?>
</body>

</html>