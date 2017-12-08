<?php
/**
 * Base controller
 * User: igor
 * Date: 12/7/17
 * Time: 9:35 PM
 */

namespace Core;

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
	public function __construct($route_params) {
		$this->route_params = $route_params;
	}
}