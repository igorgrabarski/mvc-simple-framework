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


	/** Parameters from the matched route
	 * @var array
	 */
	protected $params = [];


	/** Add a route to the Routing Table
	 *
	 * @param $route
	 * @param $params
	 */
	public function add( $route, $params = [] ) {
		// Convert route to a regex: escape forward slashes
		$route = preg_replace( '/\//', '\\/', $route );

		// Convert variables
		$route = preg_replace( '/\{([a-z]+)\}/', '(?P<\1>[a-z]+)', $route );

		// Convert variables with custom regular expressions
		$route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

		// Add start and end delimiters, and case insensitive flag
		$route = '/^' . $route . '$/i';

		$this->routes[ $route ] = $params;
	}


	/** Get all the routes from the Routing Table
	 * @return array
	 */
	public function getRoutes() {
		return $this->routes;
	}


	/** Match the route to the route in the routing table.
	 *  Set the instance $params property, if a route is found.
	 *
	 * @param $url
	 *
	 * @return bool
	 */
	public function match( $url ) {

		foreach ( $this->routes as $route => $params ) {
			if ( preg_match( $route, $url, $matches ) ) {
				foreach ( $matches as $key => $match ) {
					if ( is_string( $key ) ) {
						$params[ $key ] = $match;
					}
				}

				$this->params = $params;

				return true;
			}
		}

		return false;
	}


	public function getParams() {
		return $this->params;
	}
}