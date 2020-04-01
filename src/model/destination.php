<?php
// 2- on lie le fichier destination dans database.php



// 3- retourne toutes les destinations variable glogbale $pdo
// donc on a acces à toutes les destinations de database.php
function getAllDestinations()
{
    global $pdo;
    //3- requête donc SELECT * FROM destination ODER BY name
    // requête sans variable donc on utilise $pdo->query
    $request = $pdo->query('SELECT *FROM destination ORDER BY name');

    // et on retourne tout les resultats ensuite on retourne dans acceuil
    return $request->fetchAll(); 

}
