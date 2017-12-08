<?php


/**
 *  Front controller
 */


/**
 *  Autoloader
 */


/**
 *  Autoloader
 */
require_once '../vendor/autoload.php';

$router = new Core\Router();

// Add the routes

$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');
$router->add('{action}/{controller}/{id:\d+}');
$router->add('{controller}/{id:\d+}/{action}');

// Dispatch the route
$router->dispatch($_SERVER['QUERY_STRING']);