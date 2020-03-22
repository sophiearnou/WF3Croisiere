<?php 
$title = 'WF3 Croisière';

$slides = [];
ob_start(); ?>
<h1>WF3 Croisière</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Trouvez votre croisière</div>
            <div class="card-body">
                <form action="index.php" method="GET">
                    <div class="form-group">
                        <label class="form-label">Destination</label>
                        <select name="destination" class="form-control">
                            <option value="">Toutes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date de départ après</label>
                        <input type="date" class="form-control" name="date" value="<?=date('Y-m-d')?>"/>
                    </div>
                    <input type="hidden" name="p" value="recherche"/>
                    <button type="submit" class="btn btn-primary btn-block">Rechercher</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <?php if (count($slides) > 0) : ?>
        <div id="carouselIndex" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <?php foreach ($slides as $key => $slide) : ?>
                <div class="carousel-item <?php if ($key == 0) echo "active"; ?>">
                    <img src="<?=$slide['photo']?>" class="d-block w-100" alt="<?=$slide['name']?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?=$slide['name']?></h5>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselIndex" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndex" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <hr/>
            <?php endif; ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>