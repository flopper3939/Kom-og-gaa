<?php
class tools {
	/*
		Contains custom functions
		EVERYTHING IN TOOLS.PHP MUST BE STATIC DEFINED!


	*/
	public static function getValue($key) {
		if (isset($_POST[$key]) && !empty($_POST[$key]))
			return $_POST[$key];
		if (isset($_GET[$key]) && !empty($_GET[$key]))
			return $_GET[$key];
		return '';

	}

}

?>