<?php

namespace Core;

/**
 * Error and exception handler
 * User: igor
 * Date: 12/8/17
 * Time: 10:35 PM
 */

class Error {

	/**
	 *
	 *  Error handler.
	 *  Converts all errors to exceptions
	 *  by throwing an ErrorException
	 *
	 * @param int $level Error level
	 * @param string $message Error message
	 * @param string $file Filename the error was raised in
	 * @param int $line Line number in the file
	 *
	 * @throws \ErrorException
	 */
	public static function errorHandler( $level, $message, $file, $line ) {
		if ( error_reporting() !== 0 ) {
			throw new \ErrorException( $message, 0, $level, $file, $line );
		}
	}


	/**
	 *  Exception handler
	 *
	 * @param Exception $exception The exception
	 */
	public static function exceptionHandler( $exception ) {
		echo "<h1>Fatal error</h1>";
		echo "<p>Uncaught exception: '" . get_class( $exception ) . "'</p>";
		echo "<p>Message: '" . $exception->getMessage() . "'</p>";
		echo "<p>Stack trace: <pre>" . $exception->getTraceAsString() . "</pre></p>";
		echo "<p>Thrown in : '" . $exception->getFile() . "' on line " .
		     $exception->getLine() . "</p>";
	}
}