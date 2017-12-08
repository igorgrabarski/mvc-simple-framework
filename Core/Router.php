<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 12/6/17
 * Time: 8:38 PM
 */

namespace Core;

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
		$route = preg_replace( '/\{([a-z-]+)\}/', '(?P<\1>[a-z-]+)', $route );

		// Convert variables with custom regular expressions
		$route = preg_replace( '/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route );

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


	/**
	 * @return array
	 */
	public function getParams() {
		return $this->params;
	}


	/** Dispatch the route, create the controller class instance
	 *  and invoke action method on this instance
	 * @param string $url The route URL
	 */
	public function dispatch( $url ) {
		if ( $this->match( $url ) ) {
			$controller = $this->params['controller'];
			$controller = $this->convertToStudlyCaps( $controller );
			$controller = "App\Controllers\\$controller";

			if ( class_exists( $controller ) ) {
				$controller_object = new $controller();

				$action = $this->params['action'];
				$action = $this->convertToCamelCase( $action );

				if ( is_callable( [ $controller_object, $action ] ) ) {
					$controller_object->$action();
				} else {
					echo "Method $action (in controller $controller) not found";
				}
			} else {
				echo "Controller class $controller not found";
			}
		} else {
			echo 'No route matched';
		}
	}


	/** Convert the string with hyphens to StudlyCaps
	 *  e.g. post-authors => PostAuthors
	 * @param string $string The string to convert
	 *
	 * @return mixed
	 */
	public function convertToStudlyCaps( $string ) {
		return str_replace( ' ', '', ucwords( str_replace( '-', ' ', $string ) ) );
	}


	/** Convert the string with hyphens to camelCase
	 *  e.g. add-new => addNew
	 * @param string $string The string to convert
	 */
	public function convertToCamelCase($string){
		return lcfirst($this->convertToStudlyCaps($string));
	}
}