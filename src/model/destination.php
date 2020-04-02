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


//56- on fait une requete pour recuperer une destination par rapport à son id ensuite on la charge on va dans destinationEdit pour appeler la fonction
// Retourne une destination.
function getOneDestination(int $id)
{
    global $pdo;

    $request = $pdo->prepare('SELECT * FROM destination WHERE id = :id'); // execute une requête et retourne
    $request->bindValue(':id', $id, PDO::PARAM_INT); //':id' veux dire id egal à l'id
    $request->execute();

    return $request->fetch();
}

// 60-enregistre une destination    int $id =0 si id egal à 0 on modifie sinon on ajoute
//fonction qui soit ajoute soit modifie
//71- on rajoute en dernier parametre string $olPhotoUrl = null
function saveDestination(string $name, string $description, array $photo = [], int $id = 0, string $olPhotoUrl = null)
{
    //60a- traitement des données
    $name = trim(strip_tags($name));
    $description = trim(strip_tags($description, '<p><a><strong><hr>'));//le trim enlève les espace avant et après le texte et strip_tags enlève les balises html Autorise seulement les balises <p><a><<trong><hr>
    //60b- on crée une variable


  /*67-
    - Une fichier n'est envoyé depuis un formulaire seulement si la balise form contient l'attribut enctype="multipart/form-data"
    - Une fois le formulaire envoyé, le fichier est stocké dans un dossier temporaire de php
    - On récupère les informations de ces fichiers dans la superglobale $_FILES
    - $_FILES va contenir le chemin temporaire du fichier
    - Si le fichier est valide (le bon type de fichier), on déplace le fichier dans notre application
    $_FILES['photo']['name']: Nom du fichier envoyé (nom original)
    $_FILES['photo']['type']: Le type du fichier (exemple: image/png)
    $_FILES['photo']['size']: La taille du fichier en octets
    $_FILES['photo']['tmp_name']: Le nom temporaire du fichier chargé sur le serveur
    $_FILES['photo']['error']: Eventuelle erreur
    */

    //68- on test si il y a pas d'erreur
    //on met une phto url a vide si 
    //72 on rajoute le parametre $oldPhotoUrl ensuite dans destinationEdit
    $photoUrl = $oldPhotoUrl; 
    if ($_FILES['photo']['error'] == UPLOAD_ERR_OK){ // Il y a pas eu une erreur lors de l'envoi du fichier
        //Met le lien de la photo pour l'enregistrer dans la base de données
        //74- on rajoute .uniqid(). cela génere une chaine aléatoire permet d'avoir un unique nom sur les fichiers photos
        $photoUrl = "uploads/".uniqid().$_FILES['photo']['name'];
    }

    //var_dump($_FILES); //67
    //exit(); //67

    global $pdo;

    //60c si....   ensuite fichier destinationedit
     if (0 == $id) { // Ajoute une destination
    //62
    $request = $pdo->prepare('INSERT INTO destination (name, description, photo)
        VALUES (:name, :description, :photo)');
    } else { // Modifie une destination
        $request = $pdo->prepare('UPDATE destination 
        SET name = :name, description = :description, photo = :photo 
        WHERE id = :id');
        $request->bindValue(':id', $id);
    }
        // on est sure que $request contient une requête avec les paramètres suivants
        $request->bindValue(':name', $name);
        $request->bindValue(':description', $description);
        $request->bindValue(':photo', $photoUrl);

        //63 on execute pour savoir si la requete s'est bien passé ou pas apres destination edit
        if ($request->execute()) { // La requête n'a pas d'erreur
    
 
            //69 ensuite sur destinations dans page admin
            //75 on change (!empty($photoUrl)) par ($photoUrl != $oldPhotoUrl)

            if ($photoUrl != $oldPhotoUrl){//Si la variable $photoUrl n'est pas vide => il y a une photo

                //76 si l'ancienne photo existe
                if(file_exists($oldPhotoUrl))
                rmdir($oldPhotoUrl); // Supprime l'ancienne photo

                // Si déplace le fichier temporaire dans le lien généré "uploads/nom_du_fichier"
            move_uploaded_file($_FILES['photo']['tmp_name'], $photoUrl);
                //copy();
            }
            return ['type' => 'success', 'message' => 'La destination a bien été enregistré'];
    }

        //64 var_dump
        var_dump($request->errorInfo());

    return ['type' => 'error', 'message' => 'Une erreur est survenue.'];



        //61a- var_dump($request->errorInfo());
}


