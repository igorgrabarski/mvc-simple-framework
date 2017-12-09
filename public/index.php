<?php
/**
 *  Front controller
 */

/**
 *  Autoloader
 */
require_once '../vendor/autoload.php';


/**
 * Error and Exception handling
 *
 */
error_reporting( E_ALL );
set_error_handler( 'Core\Error::errorHandler' );
set_exception_handler( 'Core\Error::exceptionHandler' );


// Create router instance
$router = new Core\Router();

// Add the routes
$router->add( '{controller}/{action}' );
$router->add( 'admin/{action}/{controller}' );
$router->add( '{action}/{controller}/{id:\d+}' );
$router->add( '{controller}/{id:\d+}/{action}' );

// Dispatch the route
$router->dispatch( $_SERVER['QUERY_STRING'] );