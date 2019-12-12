<h1 class="text-center">Bienvenue sur le site du Bon Racoin !</h1>
<div class="row">
    <div class="col-12 text-center">
        <p>Vous avez un objet que vous voulez vendre ? Faites une annonce, et attendez qu'on vous appelle !</p>
    </div>
    <div class="col-12 py-3">
        <h2>Les dernières annonces</h2>
    </div>
    <?php foreach($annonces as $a): ?>
    <div class="col-md-3 col-12 py-3">
        <div class="card">
            <?php
                $photo = explode(",",$a['photos'])[0];
            ?>
            <img class="card-img-top" src="public/img/annonce/<?= $photo ?>" alt="Photo annonce <?= $a['titre'] ?>">
            <div class="card-body">
                <h3 class="card-title"><?= $a['titre'] ?></h3>
                <h5><?= $a['prix'] ?> € - <?= $a['pseudo'] ?></h5>
                <p class="card-text"><?= substr($a['texte'], 0, 20) ?>...</p>
                <a href="/annonce/<?= $a['id'] ?>" class="btn btn-primary">Voir l'annonce</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>