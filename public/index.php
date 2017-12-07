<?php

require '../Core/Router.php';

$router = new Router();

// Add the routes
$router->add('', [ 'controller' => 'Home', 'action' => 'index' ]);
$router->add('posts', [ 'controller' => 'Posts', 'action' => 'index' ]);
//$router->add('posts/new', [ 'controller' => 'Posts', 'action' => 'new' ]);
$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');
$router->add('{action}/{controller}/{id:\d+}');



$url = $_SERVER['QUERY_STRING'];

if($router->match($url)){
	echo '<pre>';
	print_r($router->getParams());
	echo '</pre>';
}
else {
	echo 'Error 404! Page not found!';
}