<?php

namespace App\Models;

use PDO;
/**
 * Post model
 * User: igor
 * Date: 12/8/17
 * Time: 8:12 PM
 */

class Post extends \Core\Model {


	/**
	 * Get all the posts as an associative array
	 */
	public static function getAll(){
		$host = 'localhost';
		$dbname = 'mvc';
		$username = 'root';
		$password = 'root';

		try{

			$db = static::getDB();

			$stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');

			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $results;
		}
		catch (\PDOException $e){
			echo $e->getMessage();
		}
	}
}