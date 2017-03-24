<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wrapper.php');
$password = $_POST['password'];
$email = $_POST['email'];

if (login::user_login($email, $password)) {
	header('location: /');
}
else {
	$_SESSION['login_error'] = 1;
	header('location: /');
}



?>