<?php
    namespace App\Model;
    class AnnonceModel extends Model
    {

        public function getLastAnnonces()
        {
            return $this->executerRequete("SELECT annonce.*, utilisateur.pseudo FROM annonce INNER JOIN utilisateur ON utilisateur.id = annonce.utilisateur_id ORDER BY dateannonce DESC LIMIT 4")->fetchAll();
        }

    }