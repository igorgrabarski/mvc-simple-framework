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
	 * @throws \Exception
	 */
	protected static function getDB() {

		static $db = null;

		if ( $db === null ) {

			try {

				$dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';

				$db = new PDO( $dsn, Config::DB_USER, Config::DB_PASSWORD );

				// Throw an exception when error occurs
				$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			} catch ( \PDOException $e ) {
				throw new \Exception( $e->getMessage() );
			}
		}

		return $db;
	}
}