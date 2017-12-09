<?php

namespace Core;

/**
 * Base controller
 * User: igor
 * Date: 12/7/17
 * Time: 9:35 PM
 */

abstract class Controller {


	/**
	 * Parameters from the matched route
	 *
	 * @var array
	 */
	protected $route_params = [];


	/**
	 * Controller constructor.
	 *
	 * @param array $route_params Parameters from the route
	 */
	public function __construct( $route_params ) {
		$this->route_params = $route_params;
	}


	/**
	 *
	 *
	 * @param $name
	 * @param $arguments
	 *
	 * @throws \Exception
	 */
	public function __call( $name, $arguments ) {
		$method = $name . 'Action';

		if ( method_exists( $this, $method ) ) {
			if ( $this->before() !== false ) {
				call_user_func_array( [ $this, $method ], $arguments );
				$this->after();
			}
		} else {
			throw new \Exception( "Method $method not found in controller " .
			                      get_class( $this ) );
		}
	}


	/**
	 * Before filter - called before an action method
	 */
	protected function before() {

	}

	/**
	 * After filter - called after an action method
	 */
	protected function after() {

	}
}