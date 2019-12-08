<?php

namespace App\Configuration;
/**
 * Classe Configuration
 * Toutes les configurations pour que le site fonctionne
 */
class Configuration
{
    // * Base de données
    public static $adresse_de_host = "localhost";
    public static $nom_de_la_base = "lebonracoin";
    public static $nom_du_user = "root";
    public static $mot_de_passe = "";

    // * views
    public static $chemin_template = "views/templates/";
    public static $chemin_page = "views/pages/";
    public static $chemin_parts = "views/parts/";

    // * gestion des erreurs
    public static $error_cont = "errorController";
    public static $error_method = "error";

    /**
     * Configuration::get()
     * Permet de retourner une propriété décrite dans la classe Configuration
     *
     * @param string $var la propriété que l'on veut récupérer
     * @return string le contenu de la propriété que l'on veut récupérer
     */
    public static function get($var)
    {
        return self::$$var;
    }

}