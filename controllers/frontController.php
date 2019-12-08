<?php
    namespace App\Controller;

    use App\Model\AnnonceModel as AnnonceModel;
    use App\View\View as View;
    class frontController
    {

        public function home(): void
        {
            $am = new AnnonceModel();
            $annonces = $am->getLastAnnonces();
            $v = new View("Page d'accueil", "layout", "home.php");
            $v -> requireView(array('annonces' => $annonces));
        }

    }