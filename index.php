<?php

    session_start();

    include_once("public/php/functions.php");

    include_once("core/Configuration.php");
    
    include_once("core/Router.php");
    include_once("core/Route.php");
    include_once("core/Model.php");
    include_once("core/View.php");

    include_once("models/AnnonceModel.php");

    include_once("controllers/frontController.php");
    include_once("controllers/errorController.php");

    use App\Router\Router as Router;
    use App\Controller\errorController as Error;

    // $b = new BlogModel();
    // print_r($b->getTruc());

    // $v = new View("Test", "layout", "test.php");
    // $v -> requireView();

    $router = new Router($_SERVER['REQUEST_URI']);

    $router->get('/', 'front#home');
    $router->get('/annonces', 'front#annonces');
    $router->get('/annonce/:id', 'front#annonce')->with('id', '[0-9]+');
    // $router->get('/machin/:id', 'blog#machin')->with('id', '[0-9]+');

    try
    {
        $router->run();
    }
    catch(Exception $e)
    {
        Error::error($e->getMessage(), $e->getCode());
    }

