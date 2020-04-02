<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=wf3_croisiere', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
$pdo->exec("SET CHARACTER SET utf8"); // Indique à PDO qu'on veut de l'encodage UTF-8

// 2- on inclus le nouveau fichier destination.php ensuite on va aller chercher la variable pdo dans destination.php
require_once 'destination.php';//reviens à copier/coller le code de destination.php

// 13 et ensuite on va dans cruise
require_once 'cruise.php';
require_once 'user.php';//25a