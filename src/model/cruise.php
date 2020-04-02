<?php
//12- donc on recherche une croisiere
// on doit ecrire la requete mais il y a une condition ON DOIT FAIRE ATTENTION CAR ON A UNE DESTINATION OU TOUTES LES DESTINATIONS
function searchCruise($destinationId, $dateDeparture)
{
    //12a- SELECT * FROM cruise WHERE date_departure >= : date_departure AND destination_id = :destinationId
    // Problème quand $destinationId est vide on veut toutes les croisières
     //SELECT * FROM cruise WHERE date_departure >= : date_departure



        // 15- on fait des requêtes avec jointure
    // SELECT c.date_departure, c.date_arrival, c.id, c.boat, d.name, d.photo FROM cruise AS c
    // JOIN destination AS d ON d.id = c.destination_id WHERE ...

       //  stocker la requête dans une chaine pour l'utiliser la suite ensuite on va sur le fichier recherche
    $queryStr = 'SELECT c.date_departure, c.date_arrival, c.id, c.boat, d.name, d.photo
     FROM cruise AS c
     JOIN destination AS d ON d.id = c.destination_id
    WHERE c.date_departure >= :dateDeparture' ;

  
    if ($destinationId >0) {//la condition se fait seuelment si la recherche se fait sur une destination
        $queryStr .= ' AND c.destination_id = :destinationId';
        //la requête va être = à SELECT * FROM cruise WHERE date_departure >= : date_departure AND destination_id = :destinationId
    }
    //12b- on fait un global pdo pour avoir acces à la variable pdo et charger la variable $pdo définie dans database.php
    global $pdo;
    //12c- ensuite on fait la requête
    $request = $pdo->prepare($queryStr);
    $request->bindValue(':dateDeparture', $dateDeparture);
    //12d Refaire un condition pour envoyer le parametre ':destinationId' s'il existe ensuite on fait
    //unrequire_once 'cruise.php'; sur le fichier database
    if ($destinationId > 0) {
        $request->bindValue(':destinationId', $destinationId);

    }
//14- execute la requête $request
    $request->execute();

    return $request->fetchAll();

}