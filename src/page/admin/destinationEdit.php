
<?php
// 54- on copie le modelDePage
$title = 'Modifier une destination';

// 57 on stock dans des variables
//$id = $_GET['id'];

//66 on rajoute par rapport à ci dessus ?? 0 ensuite on va sur src model destination
$id = $_GET['id'] ?? 0;
$dest = getOneDestination($id);
// 58 on test
// var_dump($dest);

//55- on récupère une destination par rapport à son id donc il faut ajouter un fonction donc destination.php dans dossier model

//61 on test puis var_dump dans destination.php en cas d'erreur ensuite dans destionation
//64 on modifie ensuite on ajoutera une destination donc un bouton donc dans admin pade destinations
//73 on rajoute $des['photo'] ensuite destination
if (!empty($_POST)) {
    $result = saveDestination($_POST['name'], $_POST['description'], [], $id, $des['photo']);

    addFlashMessage($result['type'], $result['message']);

    if ('success' == $result['type']) {
        header('Location: index.php?p=admin_destinations');
        exit(); // Quitte ce script PHP
    }
}
 


ob_start();
?>
<h1><?=$title; ?></h1>
<!-- 60 on appelle les icones du menu avec require-->
<?php require 'menu.php'; ?>

 <!-- 59- on fait le form -->
 <form action="" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" class="form-control" name="name" value="<?=$dest['name']; ?>">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?=$dest['description']; ?></textarea>
            </div>

            <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="photo" name="photo">
                <label class="custom-file-label" for="photo" data-browse="Parcourir">Photo</label>
            </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
</form>

 
<?php
$content = ob_get_clean();

require_once '../template.php';
?>
