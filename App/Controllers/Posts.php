<?php

namespace App\Controllers;

/**
 * Posts Controller
 * User: igor
 * Date: 12/7/17
 * Time: 7:02 PM
 */

use \Core\View;
use App\Models\Post;

class Posts extends \Core\Controller {


	/**
	 * Show the index page
	 */
	protected function indexAction(){

		$posts = Post::getAll();

		View::renderTemplate('Posts/index.html', [
			'posts' => $posts
		]);
	}

	/**
	 * Show the add new page
	 */
	protected function addNewAction(){
		echo 'addNew action in Posts controller';
	}


	/**
	 * Show the edit page
	 */
	protected function editAction(){
		echo 'edit action in the Posts controller';
		echo '<p>Route parameters: <pre>' .
		     htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
	}
}