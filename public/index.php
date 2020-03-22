<?php 
require_once('./../src/common.php');

// On récupére la valeur GET "p" qui se trouve dans le lien
$page = $_GET['p']?? "accueil";

// S'il y a la chaine "admin_" dans cette variable
if (strpos($page, 'admin_') !== false) {
    $page = substr($page, 6); // On supprime "admin_" de la chaîne
    checkAdmin(); // Test si l'utilisateur est administrateur
    require_once("./../src/page/admin/$page.php"); // Charge la page dans le dossier admin
} else {
    require_once("./../src/page/$page.php"); // Charge la page
}