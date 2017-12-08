<?php
/**
 * Posts Controller
 * User: igor
 * Date: 12/7/17
 * Time: 7:02 PM
 */


namespace App\Controllers;

class Posts extends \Core\Controller {


	/**
	 * Show the index page
	 */
	public function index(){
		echo 'index action in Posts controller';
	}

	/**
	 * Show the add new page
	 */
	public function addNew(){
		echo 'addNew action in Posts controller';
	}

	public function edit(){
		echo 'edit action in the Posts controller';
		echo '<p>Route parameters: <pre>' .
		     htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
	}
}