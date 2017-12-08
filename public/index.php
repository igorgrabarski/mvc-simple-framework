<?php

require '../Core/Router.php';

require '../App/Controllers/Posts.php';

$router = new Router();

// Add the routes

$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');
$router->add('{action}/{controller}/{id:\d+}');

// Dispatch the route
$router->dispatch($_SERVER['QUERY_STRING']);