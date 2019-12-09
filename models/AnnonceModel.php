<?php
    namespace App\Model;
    class AnnonceModel extends Model
    {

        public function getLastAnnonces()
        {
            return $this->executerRequete("SELECT annonce.*, utilisateur.pseudo FROM annonce INNER JOIN utilisateur ON utilisateur.id = annonce.utilisateur_id ORDER BY dateannonce DESC LIMIT 4")->fetchAll();
        }

        public function getAnnonce($id)
        {
            return $this->executerRequete("SELECT annonce.*, utilisateur.pseudo, utilisateur.adresse, utilisateur.codepostal, utilisateur.ville FROM annonce INNER JOIN utilisateur ON utilisateur.id = annonce.utilisateur_id WHERE annonce.id = ?", array($id))->fetch();
        }

        public function getAnnonces($last = 0)
        {
            return $this->executerRequete("SELECT annonce.*, utilisateur.pseudo FROM annonce INNER JOIN utilisateur ON utilisateur.id = annonce.utilisateur_id ORDER BY dateannonce DESC".(($last) ? ' LIMIT '.$last : ''))->fetchAll();
        }

    }