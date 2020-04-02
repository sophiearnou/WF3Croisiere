<?php

/**
 * 25- donc on ajoute une fonction qui va tester si user existe 
 * on oublie pas de le connecter à database/la fonction retourne 
 * si le nom de l'utilisateur OU l'adresse email existe déjà
 */
function isUserExists($username, $email)
{
    // SELECT * FROM user WHERE username = :username OR email = :email
    global $pdo;
    $request = $pdo->prepare('SELECT * FROM user WHERE username = :username OR email = :email');
    $request->bindValue(':username', $username);
    $request->bindValue(':email', $email);

    $request->execute();
    $result = $request->fetch(); // fetch car on a juste besoin d'une ligne
    // fetch retourne false s'il ne trouve pas d'user, et retourne un tableau s'il y en a un

    return is_array($result); // Retourne vrai si $result est un tableau
}

/**
 * //26- Ajoute un utilisateur
 * @return array va retourner un tableau contenant un message et le type de message
 */
function addUser($username, $email, $password)
{
    global $pdo;

    if (isUserExists($username, $email)) { // Si l'utilisateur existe on retourne une erreur
        return ['message' => "L'utilisateur existe déjà", 'type' => 'error'];
    }

    //27- on crypte le mot de passe
    $password = password_hash($password, PASSWORD_DEFAULT);
//28- requete d'ajout qui prepare
    $request = $pdo->prepare('INSERT INTO user (username, email, password) VALUES (:username, :email, :password)');

//on dit que username = $username
    $request->bindValue(':username', $username);
    $request->bindValue(':email', $email);
    $request->bindValue(':password', $password);

//29- on execute 
    if (!$request->execute()) { // L'execution de la requête ne s'est pas bien déroulé
        var_dump($request->errorInfo());  // 30- sert pour afficher l'erreur explicite de pdo pour nous

        //31- dans inscripttion.php on rajouter username
        return ['message' => 'Une erreur est survenue', 'type' => 'error'];
    }

    return ['message' => 'Bienvenue', 'type' => 'success'];
}

//35- 
function login($username, $password)
{
    global $pdo;
   // on test si on trouve un utilisateur à user name
   // charge d'abord l'utilisateur par rapport à l'username entré
    $request = $pdo->prepare('SELECT * FROM user where username=:username');
    $request->bindValue('username', $username);
    $request->execute();

    $user = $request->fetch();
// 36- on test si l'utilisateur existe
// si l'utilisateur n'existe pas on retourne un tableau

if (!$user){
    return ['message'=> "L'utilisateur n'existe pas", 'type' => 'error'];
    //37- on verifie le mot de pass
}
   //37- on verifie le mot de pass
   //si le mot de passe n'est pas bon
   if (!password_verify($password, $user['password'])) {
       return ['message'=> 'Mot de passe incorrecte', 'type' =>'error'];
   }

  
   //39-on va se souvenir de 'l'utilisateur donc on utilise les sessions APRES on va sur connexion
   //on va se souvenir de l'utilisateur, on enregistre dans des sessions
   //il est impossible pour l'utilisateur de modifier une variable session
   $_SESSION['user_id'] = $user['id'];
   $_SESSION['user_username'] = $user['username'];
   $_SESSION['user_admin'] = $user['admin'];

    //38- connexion
   return ['message' => "Ravi de vous revoir $username", 'type' => 'success'];
}

// 42- déconnexion ensuite creation flashmessage
function logout()
{
    unset($_SESSION['user_id']);
    unset($_SESSION['user_username']);
    unset($_SESSION['user_admin']);
}