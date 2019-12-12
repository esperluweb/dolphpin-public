<?php
    namespace App\Controller;

    use App\Model\AnnonceModel as AnnonceModel;
    use App\Model\UtilisateurModel as UtilisateurModel;
    use App\View\View as View;
    use Exception;

    class frontController
    {

        public function home(): void
        {
            $am = new AnnonceModel();
            $annonces = $am->getAnnonces(4);
            // $test = $am -> read("annonce", null, array("id" => "="), array(1));
            
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

        public function connexion()
        {
            $v = new View("Connexion", "layout", "auth/connexion.php");
            $v -> requireView();
        }

        public function connexionPost()
        {
            if(!is_empty($_POST) && !vide($_POST['email']) && !vide($_POST['motdepasse']))
            {
                extract($_POST);
                $um = new UtilisateurModel();
                $utilisateur = $um -> getUtilisateur($email);
                if(!vide($utilisateur) && $motdepasse === $utilisateur['motdepasse'])
                {
                    $_SESSION = array(
                        'id' => $utilisateur['id'],
                        'pseudo' => $utilisateur['pseudo']
                    );

                    header("Location: /");
                }
                else
                {
                    throw new Exception("Erreur lors de la connexion (mauvais email/mot de passe)", 401);
                }
            }
            else
            {
                throw new Exception("Erreur lors de la connexion (mauvais email/mot de passe)", 401);
            }
        }

        public function inscription()
        {
            $v = new View("Inscription", "layout", "auth/inscription.php");
            $v -> requireView();
        }

        public function inscriptionPost()
        {
            if(!is_empty($_POST) && !vide($_POST['email']) && !vide($_POST['motdepasse']) && !vide($_POST['motdepasse_confirm']) && !vide($_POST['pseudo']) && !vide($_POST['adresse']) && !vide($_POST['codepostal']) && !vide($_POST['ville']))
            {
                extract($_POST);
                $um = new UtilisateurModel();
                $utilisateur = $um -> getUtilisateur($email, $pseudo);
                if(vide($utilisateur) && $motdepasse === $motdepasse_confirm)
                {
                    $um -> setUtilisateur($pseudo, $email, $motdepasse, $adresse, $codepostal, $ville);

                    $v = new View("Inscription réussie", "layout", "auth/inscription_ok.php");
                    $v -> requireView(array('email' => $email));
                }
                else
                {
                    throw new Exception("L'utilisateur existe déjà", 401);
                }
            }
            else
            {
                throw new Exception("Erreur lors de la saisie du formulaire", 401);
            }
        }

        public function deconnexion()
        {
            if(is_connected())
            {
                session_unset();
                header("Location: /");
            }
            else
            {
                throw new Exception("Vous n'êtes pas connecté", 401);
            }
        }

    }