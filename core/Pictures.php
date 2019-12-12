<?php
    namespace App\Pictures;

    use App\Configuration\Configuration as Configuration;

    use \PDO as PDO;

    class Pictures
    {

        /**
         * addPictures($tab_fichiers, $chemin, $nom_fic, $id)
         * Permet d'ajouter des photos dans un dossier précis, avec renommage
         *
         * @param Array $tab_fichiers le tableau contenant les fichiers à ajouter
         * @param string $chemin le chemin d'accès où se retrouveront les photos
         * @param string $nom_fic le début du nom du fichier. Note : le nom sera de la forme $nom_fic_$id_$i.$extension
         * @param integer $id l'id de l'annonce pour relier la photo à l'annonce
         * @return string la chaîne à intégrer en base pour relier les photos à l'annonce
         */
        public static function addPictures($tab_fichiers, $chemin, $nom_fic, $id)
        {
            extract($tab_fichiers);
            $new_photos = [];
            $photos_bdd = "";
            $i = 0;
            foreach($photos['name'] as $p):
                $new_photos[$i] = $chemin."/".$nom_fic.$id."_".$i.".".getExtension($p);
                $photos_bdd .= $nom_fic.$id."_".$i++.".".getExtension($p).",";
            endforeach;
            $photos_bdd = substr($photos_bdd, 0, -1);
            $old_photos = $photos['tmp_name'];
            $i = 0;
            foreach($old_photos as $o):
                move_uploaded_file($o, $new_photos[$i++]);
            endforeach;
            return $photos_bdd;
        }

    }