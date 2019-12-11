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
            $fichiers = $_FILES;
            extract($fichiers);
            extract($_POST);
            $new_photos = [];
            $photos_bdd = "";
            $am = new AnnonceModel();
            $id = $am->addAnnonce($titre, $texte, $prix);
            $i = 0;
            foreach($photos['name'] as $p):
                $new_photos[$i] = "public/img/annonce/annonce_".$id."_".$i.".".getExtension($p);
                $photos_bdd .= "annonce_".$id."_".$i++.".".getExtension($p).",";
            endforeach;
            $photos_bdd = substr($photos_bdd, 0, -1);
            $old_photos = $photos['tmp_name'];
            $i = 0;
            foreach($old_photos as $o):
                move_uploaded_file($o, $new_photos[$i++]);
            endforeach;
            $am -> addPhotos($id, $photos_bdd);

            header("Location: /annonce/$id");
        }

    }