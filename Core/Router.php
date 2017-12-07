<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12/6/17
 * Time: 8:38 PM
 */

class Router {


	/** The Routing Table
	 * @var array
	 */
	protected $routes = [];


	/** Add a route to the Routing Table
	 * @param $route
	 * @param $params
	 */
	public function add($route, $params){
		$this->routes[$route] = $params;
	}


	/** Get all the routes from the Routing Table
	 * @return array
	 */
	public function getRoutes(){
		return $this->routes;
	}
}