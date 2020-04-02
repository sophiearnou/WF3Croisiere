<?php //50

$title = 'Gestion des destinations';//50
$destinations = getAllDestinations();  //51 on récupère les destinations

ob_start();//50

//50
?>   

<h1><?=$title; ?></h1><!-- 50 -->
 
<?php require_once 'menu.php'; ?><!-- 50 -->
<!-- 65 -->
<div class="d-flex justify-content-end mb-2"> <!--mb-2 veut dire margin bottom -->
<a href="index.php?p=admin_destinationEdit" class="btn btn-success">
    <i class="fas fa-plus"></i> Ajouter une destination
    </a>
</div>
<!-- 51 on ajoute un tableau ensuite on affichera toute les destinations ENSUITE destinationedit-->
<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Photo</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
     <!-- 52- tableau  je recupère le tableau des destination-->
            <?php foreach ($destinations as $dest): ?>
                    <tr>
                    <!--70 on charge la photo ensuite dans destination de model-->
                       <td>
                    <?php if (!empty($dest['photo'])):?>
                    <img style="width:120px;" src="<?=$dest['photo']; ?>" alt="Photo"/>
                    <?php endif; ?>
                </td>
                       <td><?=$dest['name']; ?></td>
                       <td><?=substr($dest['description'], 0, 20); ?></td>
                       <td>
                       <!-- 54 le lien pointe sur la page destinationEdit - On crée cette page-->
                       <!-- 53 href  https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/912799-transmettez-des-donnees-avec-lurl-->
                      <a class="btn btn-secondary" href="index.php?p=admin_destinationEdit&id=<?=$dest['id']; ?>">
                        <i class="fas fa-edit"></i>
                    </a>

                       </td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php //50

$content = ob_get_clean();//50

require_once '../template.php';//50
