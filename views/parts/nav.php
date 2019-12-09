<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-warning">
    <a class="navbar-brand" href="./">Le Bon Racoin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/annonces">Annonces</a>
            </li>
            <?php if(!is_connected()): ?> 
            <li class="nav-item">
                <a class="nav-link" href="/connexion">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/inscription">Inscription</a>
            </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="/ajout_annonce">Ajouter une annonce</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/deconnexion">Déconnexion</a>
            </li>
            <?php endif; ?>
            <!-- <li class="nav-item">
                <a class="nav-link" href="/blog">Blog</a>
            </li> -->
        </ul>
        <?php if(is_connected()): ?>
            <span class="navbar-text">Bonjour <?= $_SESSION['pseudo'] ?> !</span>
        <?php endif; ?>
    </div>
</nav>