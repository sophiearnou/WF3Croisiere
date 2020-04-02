<?php

/*
pour afficher des message qui vont être afficher sur une autre page
Gestion des messages "flash"
Stock des messages dans une session pour l'afficher sur une autre page (après une redirection)
une fois les messages lus, ils sont supprimés de la session
*/


//43- Ajoute un message flash
function addFlashMessage(string $type, string $message)
{
    // Test si $_SESSION['flash'] n'existe pas
        if (!isset($_SESSION['flash'])) {
        $_SESSION['flash'] = [];
    }
    //44- Ajout du message dans la session
    $_SESSION['flash'][] = ['type' => $type, 'message' => $message];
}

//44- retourne les messages
function getFlashMessage()
{
    // on test si $_SESSION['flash'] existe
    if (isset($_SESSION['flash'])) {
        //on stock les message dans une variable intermédiaire
        $messages = $_SESSION['flash']; // stocks les messages dans une variables
        unset($_SESSION['flash']); // Vide la session 'flash'

        return $messages;//ensuite on retourne les messages
    }
    return []; //On retourne un tableau vide pour dire qu'on a pas de messages ensuite on va dans common
}
