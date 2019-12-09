<h1><?= $annonce['titre'] ?></h1>
<h2>Par <?= $annonce['pseudo'] ?> - le <?= afficheDateHeureFr($annonce['dateannonce']) ?></h2>
<h2>Prix : <?= $annonce['prix'] ?> €</h2>
<hr>
<div class="row">
    <div class="col-md-6 col-12">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <?php
                $photos = explode(",", $annonce['photos']);
                $nb_photos = count($photos);
            ?>
            <ol class="carousel-indicators">
                <?php
                    $i = 0;
                    foreach($photos as $p):
                ?>
                <li data-target="#carouselExampleControls" data-slide-to="<?= $i ?>" <?= (!$i++) ? 'class="active"' : '' ?>></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">
                <?php
                    $i = 0;
                    foreach($photos as $p):
                ?>
                    <div class="carousel-item <?= (!$i++) ? 'active' : '' ?>">
                        <img class="d-block w-100" src="/public/img/annonce/<?= $p ?>" alt="Photo annonce <?= $annonce['titre'] ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
    </div>
    <div class="col-md-6 col-12">
        Description :
        <?= $annonce['texte'] ?>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        Adresse : <?= $annonce['adresse'] ?> <?= $annonce['codepostal'] ?> <?= $annonce['ville'] ?>
    </div>
    <div class="col-12">
        
    </div>
</div>
