<?php
    namespace App\Controller;

    use App\Model\AnnonceModel as AnnonceModel;
    use App\View\View as View;
    use Exception;

    class backController
    {

        public function addAnnonce()
        {
            $v = new View("Ajouter une annonce", "layout", "annonce/add_annonce.php");
            $v -> requireView();
        }

        public function addAnnoncePost()
        {
            extract($_FILES);
            debug([$_POST, $photos], 1);
            $am = new AnnonceModel();

            $v = new View("Annonces", "layout", "annonce/annonces.php");
            $v -> requireView(array('annonces' => $annonces));
        }

    }