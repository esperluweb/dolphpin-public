<?php
    namespace App\Model;
    
    use App\Configuration\Configuration as Configuration;

    use \PDO as PDO;
    abstract class Model {

        public static $bdd;

        /**
         * executerRequete()
         * Permet d'exécuter une requête, préparée ou non
         *
         * @param string $sql La requête à exécuter
         * @param Array $params Le tableau de paramètres (éventuellement)
         * @return Array La requête exécutée. Il faudra alors le cas échéant utiliser un fetch() ou fetchAll() pour récupérer les résultats
         */
        protected function executerRequete($sql, $params = null) {
            if ($params == null) {
                $resultat = self::getBdd()->query($sql);   // exécution directe
            }
            else {
                $resultat = self::getBdd()->prepare($sql); // requête préparée
                $resultat->execute($params);
            }
            return $resultat;
        }

        public function read($table, $col=array("*"), $where=array(), $params=NULL, $order=NULL, $sens=NULL, $limit=NULL)
        {
            $sql = "SELECT ";
            if(!vide($col))
            {
                $sql .= implode(",", $col);
            }
            else
            {
                $sql .= "* ";
            }
            $sql .= " FROM ".$table;
            if(!vide($where))
            {
                $sql .= " WHERE ";
                foreach($where as $colonne => $signe):
                    $sql .= $colonne.$signe."? AND ";
                endforeach;
                $sql = substr($sql, 0, -5);
            }
            if(!vide($order))
            {
                $sql .= "ORDER BY ".$order." ";
                if(!vide($sens))
                {
                    $sql .= $sens." ";
                }
            }
            if(!vide($limit))
            {
                $sql .= "LIMIT ".$limit;
            }

            return $this->executerRequete($sql, $params)->fetchAll();
        }

        /**
         * getLastId()
         * Permet de retourner l'ID du dernier ajour
         *
         * @return integer
         */
        protected function getLastId()
        {
            return self::getBdd()->lastInsertId ();
        }
    
        /**
         * getBdd()
         * Fonction qui permet de réutiliser à chaque le même objet PDO
         *
         * @return PDO l'objet PDO pour appeler la base de données
         */
        private static function getBdd() {
            if (self::$bdd === null) {
                // Récupération des paramètres de configuration BD
                $host  = Configuration::get("adresse_de_host");
                $name  = Configuration::get("nom_de_la_base");
                $login = Configuration::get("nom_du_user");
                $mdp   = Configuration::get("mot_de_passe");
                // Création de la connexion
                self::$bdd = new PDO('mysql:host='.$host.';dbname='.$name, $login,
                $mdp,array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ));
            }
            return self::$bdd;
        }
    }