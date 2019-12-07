<?php
    namespace App\View;
    
    use App\Configuration\Configuration as Configuration;
    /**
     *  Classe View
     */
    class View
    {
        private $title;
        private $html;
        private $layout;
        private $scripts;

        /**
         * Constructeur de la classe View
         *
         * @param string $title Le titre de la page
         * @param string $layout Le nom du template à afficher (sans le .php)
         * @param string $html Le nom de la page à afficher (sans le .php)
         * @param string $scripts Éventuellement un script JS à charger
         */
        public function __construct($title, $layout, $html, $scripts=NULL)
        {
            $this -> setTitle($title);
            $this -> setHTML(Configuration::get("chemin_page").$html);
            $this -> setLayout($layout);
            $this -> setScripts($scripts);
        }

        // GETTEURS

        public function getTitle()
        {
            return $this -> title;
        }

        public function getHTML()
        {
            return $this -> html;
        }

        public function getLayout()
        {
            return $this -> layout;
        }

        public function getScripts()
        {
            return $this -> scripts;
        }

        // SETTERS

        public function setTitle($title)
        {
            $this -> title = $title;
        }

        public function setHTML($html)
        {
            $this -> html = $html;
        }

        public function setLayout($layout)
        {
            $this -> layout = $layout;
        }

        public function setScripts($scripts)
        {
            $this -> scripts = $scripts;
        }

        // METHODES

        /**
         * requireView()
         * Permet d'appeler une vue précise
         *
         * @param Array $array un tableau de valeurs qui contient toutes les variables récupérées depuis la BDD
         * @return string la page HTML retournée
         */
        public function requireView($array=NULL)
        {
            if(!is_null($array)) extract($array);
            ob_start();
            require($this -> getHTML());
            $content = ob_get_clean();
            require(Configuration::get("chemin_template").$this -> getLayout().'.php');
        }
    }