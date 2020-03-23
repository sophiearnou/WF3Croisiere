<!DOCTYPE html>
<html lang="fr">

<head>

    <title>1- les variables</title>
</head>

<body>
    <?php
    // Déclarer une variable
    $prenom = "Pierre";

    // Nombre sans cote
    $age = 31;
    // Nombre décimal
    $taille = 1.80;

    // Booléen
    $estAdmin = true;

    /*
    comenbtaire sur plusieur ligne__
    une variable ne doit pas commencer par un chiffre
    ex: 0var -> erreur
    Peut contenir des underscores _
    Et des caractere ASCII*/

    // echo=>afficher
    echo $prenom;

    // Tableau
    // Ancienne méthode
    $fruits = array('pommes', 'poires', 'bananes');
    // Nouvelle Méthode
    $fruits = ['pommes', 'poires', 'bananes'];
    // ou plus de visibilité
    $fruits = [
        'pommes',
        'poires',
        'bananes', //virgule non indispensable à la dernière ligne mais mieux de la mettre
    ];

    // saisir les index ou (clés)

    $aliments = [
        'pomme' => 'fruit',
        'poire' => 'fruit',
        'poireau' => 'légume'
    ];
    /*
    EN JAVASCRIPT
    let tabl = ['val', 'val2'];
    let obj = {
        'prenom' : 'pierre',
        'nom' : 'dupond'
    },
    */

    $aliments = [
        'fruits' => [
            'pomme',
            'poire',
        ],
        'légumes' => [
            'poireau',
            'pomme de terre',
        ],
    ];

    //Ajouter une valeur
    $aliment['fruits'][2] = 'Noix de coco'; // js =>push

    //Afficher des variables détaillées
    var_dump($aliments); // js =>console.log()

    /********
     * Opérateurs
     * ***************
     */
    $a = 2;
    $b = 5;
    $c = 7;

    //Addition
    $res = $a + $b;

    //Division
    $res = $b / $a;

    //soustraction
    $res = $a - $b;

    // Modulo
    $res = $b % $a; // reste de la division

    $a += 10; // revient à => $a = $a + 10;
    $a *= 2;

    $a++; //Incrémentation de 1 => $a = $a +1

    echo $a;
    echo '<br/>'; // saut de ligne
    echo $a++; //Affiche $a et ensuite ajoute 1 à $a
    echo '<br/>'; // saut de ligne
    echo $a;
    echo '<br/>';
    echo ++$a; // Incrémente et affiche ensuite

    $b = $a++; //Mettre la valeur de $a dans $b ET ensuite va incrémenter $a

    $pow = $a ** $b; //Puissance
    // echo $pow; 

    // lafonction gettype() permet d'afficher le type d'une variable
    echo '$a est de type' . gettype($a) . '<br/>';
    $a = 'OK';
    echo '$a est de type' . gettype($a) . '<br/>';


    //Autre méthode pour afficher un tableau----
    print_r($aliments);
    ?>
</body>

</html>