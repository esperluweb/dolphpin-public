<?php

namespace App\Router;

class Router {

    private $url;
    private $routes = [];
    private $namedRoutes = [];

    /**
     * __construct($url)
     * Construteur de la classe Router
     *
     * @param string $url l'URL à ajouter
     */
    public function __construct($url){
        $this->url = $url;
    }

    /**
     * get($path, $callable, [$name])
     * Permet d'ajouter une route de type GET
     *
     * @param string $path l'adresse à taper
     * @param string|Callable $callable la fonction à appeler (soit un callable, soit du type 'controller#method')
     * @param string $name ???
     * @return Route
     */
    public function get($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'GET');
    }

    /**
     * post($path, $callable, [$name])
     * Permet d'ajouter une route de type POST
     *
     * @param string $path l'adresse à taper
     * @param string|Callable $callable la fonction à appeler (soit un callable, soit du type 'controller#method')
     * @param string $name ???
     * @return void
     */
    public function post($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'POST');
    }

    /**
     * add($path, $callable, $name, $method)
     * Permet d'ajouter une route de type GET
     *
     * @param string $path l'adresse à taper
     * @param string|Callable $callable la fonction à appeler (soit un callable, soit du type 'controller#method')
     * @param string $name ???
     * @param string $method la méthode à ajouter (GET, POST, ...)
     * @return void
     */
    private function add($path, $callable, $name, $method){
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if(is_string($callable) && $name === null){
            $name = $callable;
        }
        if($name){
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    /**
     * run()
     * Fonction qui permet de vérifier une correspondance entre l'URL entrée et les routes existantes
     *
     * @return void
     */
    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new \Exception('REQUEST_METHOD n\'existe pas');
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }
        throw new \Exception('Aucune route ne correspond');
    }

    /**
     * url($name, $params)
     * BOnne question ...
     *
     * @param string $name Oui
     * @param array $params Oui
     * @return void
     */
    public function url($name, $params = []){
        if(!isset($this->namedRoutes[$name])){
            throw new \Exception('Aucune route ne correspond à ce nom');
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }

}