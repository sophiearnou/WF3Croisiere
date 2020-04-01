<?php
//12- donc on recherche une croisiere
// on doit ecrire la requete mais il y a une condition ON DOIT FAIRE ATTENTION CAR ON A UNE DESTINATION OU TOUTES LES DESTINATIONS
function searchCruise($destinationId, $dateDeparture)
{
    //SELECT * FROM cruise WHERE date_departure >= : date_departure AND destination_id = :destinationId
    // Problème quand $destinationId est vide on veut toutes les croisières
     //SELECT * FROM cruise WHERE date_departure >= : date_departure
    //  stocker la requête dans une chaine pour l'utiliser la suite
    $queryStr = "SELECT * FROM cruise WHERE date_departure >= : date_departure";
    if ($destinationId >0) {
        $queryStr .= 'AND destination_id = :destinationId';
        //la requête va être = à SELECT * FROM cruise WHERE date_departure >= : date_departure AND destination_id = :destinationId
    }

}