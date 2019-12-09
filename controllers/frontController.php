<?php
    namespace App\Controller;

    use App\Model\AnnonceModel as AnnonceModel;
    use App\View\View as View;
use Exception;

class frontController
    {

        public function home(): void
        {
            $am = new AnnonceModel();
            $annonces = $am->getAnnonces(3);
            $v = new View("Page d'accueil", "layout", "home/home.php");
            $v -> requireView(array('annonces' => $annonces));
        }

        public function annonce($id)
        {
            $am = new AnnonceModel();
            $annonce = $am->getAnnonce($id);
            if(!vide($annonce))
            {
                $v = new View("Annonce n°$id", "layout", "annonce/annonce.php");
                $v -> requireView(array('annonce' => $annonce));
            }
            else
            {
                throw new Exception("L'annonce demandée n'existe pas", 404);
            }
        }

        public function annonces()
        {
            $am = new AnnonceModel();
            $annonces = $am->getAnnonces();
            $v = new View("Annonces", "layout", "annonce/annonces.php");
                $v -> requireView(array('annonces' => $annonces));
        }

    }