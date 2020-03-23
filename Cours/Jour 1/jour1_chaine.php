<?php

$object = 'une tasse de café';
$message = 'Je voudrai ' . $object . ' pour bien démarrer la journée.';

//Anti slah pour mettre une apostrophe (c'est une conténation)_
$message2 = 'Rien de tel qu\'' . $object . ' pour être en forme.';

//Double quote
$message2 = "Rien de tel qu'" . $object . ' pour être en forme.';

//Incule une variable dans une chaîne à double quote
//Attention ne fonctionne pas avec de simple quote (c'est une chaîne)__
$message4 = "Rien de tel qu'$object pour être en forme.";

echo $message;
echo '<br/>';

echo "il y a " . strlen($message4) . ' caractères'; // Retourne le nombre de caractère strlen ($str) => nbre de caracteres
echo '<br/>';

echo substr($message3, 10, 20); //retourne une chaîne à partir de 10  char de longueur 20
