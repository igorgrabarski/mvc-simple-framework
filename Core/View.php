<?php

namespace Core;
/**
 * View
 * User: igor
 * Date: 12/8/17
 * Time: 10:22 AM
 */

class View {


	/**
	 * Render a view
	 *
	 * @param $view
	 * @param array $args
	 *
	 * @throws \Exception
	 */
	public static function render( $view, $args = [] ) {

		extract( $args, EXTR_SKIP );

		$file = "../App/Views/$view";

		if ( is_readable( $file ) ) {
			require $file;
		} else {
			throw new \Exception( "$file not found" );
		}
	}

	/**
	 * Render a view template using Twig
	 *
	 * @param string $template The template file
	 * @param array $args Arguments
	 */
	public static function renderTemplate( $template, $args = [] ) {
		static $twig = null;

		if ( $twig === null ) {
			$loader = new \Twig_Loader_Filesystem( '../App/Views' );
			$twig   = new \Twig_Environment( $loader );
		}

		echo $twig->render( $template, $args );
	}
}