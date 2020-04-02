<?php
//18 on fait la variable
$title = "S'inscrire";//18

//20- erreurs pour les formulaires
$errors = []; // Erreurs pour le formulaire

//22-on cree des variables $email et $password
$username = '';
$email = '';
$password = '';

//19- test si le formulaire est envoyé 
//si la la superglobal post n'est pas vide
if (!empty($_POST)) {
    $_POST = array_map('trim', $_POST);
    $_POST = array_map('strip_tags', $_POST); // retire les balises html

    //23 on stock les valeurs POST pour les afficher dans les value des champs
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //20a- erreur formulaire
    if (strlen($_POST['username']) < 4) {
        $errors['username'] = "Le nom d'utilisateur est trop court (min: 4 charactères)";
    }

    if (strlen($_POST['password']) < 8) {
        $errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères';
    }

    //20b test si adresse est au bon format
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // Test si l'adresse email est au bon format
        $errors['email'] = "Votre adresse email n'est pas valide";
    }
    //20b
    // var_dump($errors);

    //26- on test la fonction

    if (empty($errors)) { // S'il n'y a pas d'erreur
        $result = addUser($username, $email, $password); // Ajoute l'utilisateur
        //31- ajoute l'utilisateur

        //32 si l'utilisateur a bien été ajouté
        if ('success' == $result['type']) { // L'utilisateur a bien été ajouté
            //48 à voir- et après ensuite on va sur sur phpmyadmin dans user on met 1 en administrateur ensuite on va dans template 
            addFlashMessage('success', $result['message']);
            header('Location: index.php');
            exit();
        }

        $errors['global'] = $result['message'];
    }
}

//25- Ajouter un utilisateur on cree une fonction donc requete donc on va dans model et on cree un fichier user

ob_start();//18
?>
<h1>S'inscrire</h1><!-- 18 -->
<!-- div.card.form-frame>div.card-body>(div.form-group>input:text[name="username"])+(div.form-group>input:email[name="email"])+(div.form-group>input:password[name="password"])+button:submit.btn.btn-primary.btn-block --> 
<div class="card form-frame"><!-- 18 -->
    <div class="card-body"><!-- 18 -->
     <!-- 33- on rajoute ensuite on va  dans connexion.php-->
        <?php if (isset($errors['global'])): ?>
        <div class="alert alert-danger"><?=$errors['global']; ?></div>
        <?php endif; ?>
        <form action="" method="post" novalidate>
        <!-- 21a- condition si username existe et mettre une erreur si n'existe pas-->
            <div class="form-group">
               <!-- 24- on utilise les variables -->
                <input class="form-control <?=isset($errors['username']) ? 'is-invalid' : ''; ?>" placeholder="Nom d'utilisateur" type="text" name="username" value="<?=$username; ?>">
                <?php if (isset($errors['username'])): ?>
                <div class="invalid-feedback">
                    <?=$errors['username']; ?>
                </div>
                <?php endif; ?>
            </div>
             <!-- 21a- condition si email existe et mettre une erreur si n'existe pas-->
            <div class="form-group">
                <input class="form-control <?=isset($errors['email']) ? 'is-invalid' : ''; ?>" placeholder="Adresse email" type="email" name="email" value="<?=$email; ?>">
                <?php if (isset($errors['email'])): ?>
                <div class="invalid-feedback">
                    <?=$errors['email']; ?>
                </div>
                <?php endif; ?>
            </div>
             <!-- 21a- condition si password existe et mettre une erreur si n'existe pas-->
            <div class="form-group">
                <input class="form-control <?=isset($errors['password']) ? 'is-invalid' : ''; ?>" placeholder="Mot de passe" type="password" name="password" value="<?=$password; ?>">
                <?php if (isset($errors['password'])): ?>
                <div class="invalid-feedback">
                    <?=$errors['password']; ?>
                </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();//18

require_once '../template.php';//18