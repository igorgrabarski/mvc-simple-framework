<?php

namespace Core;

use PDO;
use App\Config;

/**
 * Base Model
 * User: igor
 * Date: 12/8/17
 * Time: 9:39 PM
 */
abstract class Model {


	/**
	 *  Get the PDO database connection
	 *
	 * @return mixed
	 */
	protected static function getDB() {

		static $db = null;

		if ( $db === null ) {

			try {

				$dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';

				$db = new PDO( $dsn, Config::DB_USER, Config::DB_PASSWORD );
			} catch ( \PDOException $e ) {
				echo $e->getMessage();
			}
		}

		return $db;
	}
}