<?php
class login{
public static function user_login($email, $password) {
	$result = database::selectRow('SELECT id_student, password, admin FROM '._SQL_PREFIX_.'logins WHERE email = ?', array($email));

	if (!$result) {
		// User does not exsits
		return 0;
	}
	else {
		if (password_verify($password, $result['password'])) {
			// Login successful
			$_SESSION['id_user'] = $result['id_student'];
			$_SESSION['admin'] = $result['admin'];
			return 1;
		}
		else {
			// Password is incorrect!
			return 0;
		}
	}
}
	public static function logout() {
		session_destroy();
	}
}

?>