<?php

    include_once("core/Configuration.php");
    
    include_once("core/Router.php");
    include_once("core/Route.php");
    include_once("core/Model.php");
    include_once("core/View.php");

    include_once("models/BlogModel.php");

    include_once("controllers/blogController.php");
    include_once("controllers/errorController.php");

    use App\Router\Router as Router;
    use App\Controller\errorController as Error;

    // $b = new BlogModel();
    // print_r($b->getTruc());

    // $v = new View("Test", "layout", "test.php");
    // $v -> requireView();

    $router = new Router($_SERVER['REQUEST_URI']);

    $router->get('/', 'blog#blog');
    $router->get('/test', 'blog#test');
    $router->get('/michel', 'blog#michel');
    $router->get('/machin/:id', 'blog#machin')->with('id', '[0-9]+');

    try
    {
        $router->run();
    }
    catch(Exception $e)
    {
        Error::error($e->getMessage());
    }

