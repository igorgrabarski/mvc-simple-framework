<?php
/**
 * Home Controller
 * User: igor
 * Date: 12/7/17
 * Time: 7:33 PM
 */


namespace App\Controllers;

class Home extends \Core\Controller {

	/**
	 * Show the index page
	 */
	protected function indexAction(){
		echo 'index action in the Home controller';
	}


	/**
	 * Before filter
	 */
	protected function before() {
		echo "(before) ";
		return false;
	}

	/**
	 * After filter
	 */
	protected function after() {
		echo " (after)";
	}
}