<?php

namespace App\Router;

class Route {

    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    /**
     * __construct($path, $callabla)
     * Constructeur de la classe Route
     *
     * @param string $path Le chemin de la route   
     * @param string|Callable $callable la fonction à appliquer
     */
    public function __construct($path, $callable){
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    /**
     * with($param, $regex)
     * Fonction qui permet d'identifier des arguments
     *
     * @param string $param Le paramètre en question
     * @param string $regex La regex à appliquer
     * @return void
     */
    public function with($param, $regex){
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this;
    }

    /**
     * match($url)
     * Fonction qui permet de vérifier la correspondance entre une URL et une route
     *
     * @param string $url l'URL à tester
     * @return void
     */
    public function match($url){
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    private function paramMatch($match){
        if(isset($this->params[$match[1]])){
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+)';
    }

    /**
     * call()
     * Fonction qui permet d'appeler le callable correspondant à une route
     *
     * @return void
     */
    public function call(){
        if(is_string($this->callable)){
            $params = explode('#', $this->callable);
            $controller = "App\\Controller\\" . $params[0] . "Controller";
            $controller = new $controller();
            return call_user_func_array([$controller, $params[1]], $this->matches);
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }
    }

    /**
     * getUrl($params)
     * Oui
     *
     * @param Array $params Les paramètres
     * @return void
     */
    public function getUrl($params){
        $path = $this->path;
        foreach($params as $k => $v){
            $path = str_replace(":$k", $v, $path);
        }
        return $path;
    }

}