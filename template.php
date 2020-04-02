<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/solid.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top text-light">
            <a class="navbar-brand" href="index.php"><i class="fas fa-anchor"></i> WF3 Croisière</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainnavbar">
                <?php if (!isset($_SESSION['user_id'])) : ?>
                    <div class="ml-auto">
                        <a href="?p=connexion" class="btn btn-secondary">Se connecter</a>
                        <a href="?p=inscription" class="btn btn-secondary">S'inscrire</a>
                    </div>
                <?php else : ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="usermenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION['user_username'] ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usermenu">
                            <!-- 49-menu admin on test notre session admin  ensuite on cree page destination dans admin-->
                                                               <?php if (isset($_SESSION['user_admin']) && 1 == $_SESSION['user_admin']):?>
                                        <a href="?p=admin_accueil" class="dropdown-item"><i class="fas fa-cogs"></i> Administration</a>
                                    <?php endif; ?>

                                <a href="?p=deconnexion" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
                            </div>
                        </li>
                    </ul>
                <?php endif; ?>

            </div>
        </nav>
    </header>
    <div class="container">
    <!-- 46- affichage des message flash -->
    <?php foreach (getFlashMessage() as $msg):
        // si le type est "error", on le défini en "danger" pour bootstrap pares page connexion
          $msg['type'] = (('error' == $msg['type']) ? 'danger' : $msg['type']);
            ?>
            <div class="alert alert-<?=$msg['type']; ?> alert-dismissible fade show">
                <?=$msg['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endforeach; ?>
        <?= $content ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-custom-file-input.min.js"></script>
        <script>$(document).ready(function () {
            bsCustomFileInput.init()
        })</script>

</body>

</html>


