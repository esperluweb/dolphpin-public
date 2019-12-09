<?php
    namespace App\Model;

    class UtilisateurModel extends Model
    {
        public function getUtilisateur($email, $pseudo = NULL)
        {
            return $this->executerRequete("SELECT id, email, pseudo, motdepasse FROM utilisateur WHERE email = ? OR pseudo = ?", array($email, $pseudo))->fetch();
        }

        public function setUtilisateur($pseudo, $email, $motdepasse, $adresse, $codepostal, $ville)
        {
            return $this->executerRequete("INSERT INTO utilisateur(pseudo, email, motdepasse, adresse, codepostal, ville) VALUES (?, ?, ?, ?, ?, ?)", array($pseudo, $email, $motdepasse, $adresse, $codepostal, $ville));
        }
    }