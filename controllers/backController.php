<?php

namespace App\Controller;

use App\Model\AnnonceModel as AnnonceModel;
use App\Pictures\Pictures as Pictures;
use App\View\View as View;
use Exception;

class backController
{

    public function addAnnonce()
    {
        if (is_connected()) {
            $v = new View("Ajouter une annonce", "layout", "annonce/add_annonce.php");
            $v->requireView();
        } else {
            throw new Exception();
        }
    }

    public function addAnnoncePost()
    {
        extract($_POST);

        $am = new AnnonceModel();
        $id = $am->addAnnonce($titre, $texte, $prix);

        $photos_bdd = Pictures::addPictures($_FILES, "public/img/annonce", "annonce_", $id);
        $am->addPhotos($id, $photos_bdd);

        header("Location: /annonce/$id");
    }
}
