<?php

namespace Core;
/**
 * View
 * User: igor
 * Date: 12/8/17
 * Time: 10:22 AM
 */

class View {
	public static function render($view){
		$file = "../App/Views/$view";

		if(is_readable($file)){
			require $file;
		}
		else {
			echo "$file not found";
		}
	}
}