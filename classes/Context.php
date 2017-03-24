<?php
class context {

	private static $context;
	private $id_user;
	public $student;
	public $logged_in;
	public $admin;

	public function __construct() {
		if(isset($_SESSION['id_user'])) {
			$this->student = new student($_SESSION['id_user']);
			$this->logged_in = true;
			if (isset($_SESSION['admin']))
				$this->admin = $_SESSION['admin'];
			else
				$this->admin = 0;
		}
		else {
			$this->student = null;
			$this->logged_in = false;
			$this->admin = 0;
		}
	}

	public static function logout() {
		session_destroy();
		$this->logged_in = false;
	}


	public static function getContext() {
		if (self::$context == null)
			self::$context = new self();
		return self::$context;
	}

	public static function getCSRFToken() {
		return $_SESSION['CSRF_TOKEN'];
	}
	public static function refreshCSRFToken() {
		$_SESSION['CSRF_TIME'] = time();
		$_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32));
	}


}

?>