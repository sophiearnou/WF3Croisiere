<?php 
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=wf3_croisiere', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
$pdo->exec("SET CHARACTER SET utf8"); // Indique à PDO qu'on veut de l'encodage UTF-8