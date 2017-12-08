<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home Controller
 * User: igor
 * Date: 12/7/17
 * Time: 7:33 PM
 */

class Home extends \Core\Controller {

	/**
	 * Show the index page
	 */
	protected function indexAction(){
		View::render('Home/index.php', [
			'name' => 'Igor',
			'colors' => ['red', 'green', 'blue']
		]);
	}


	/**
	 * Before filter
	 */
	protected function before() {
		echo "(before) ";
	}

	/**
	 * After filter
	 */
	protected function after() {
		echo " (after)";
	}
}