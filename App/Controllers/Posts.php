<?php
/**
 * Posts Controller
 * User: igor
 * Date: 12/7/17
 * Time: 7:02 PM
 */


namespace App\Controllers;

class Posts {


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
}