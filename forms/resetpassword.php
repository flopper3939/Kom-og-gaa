<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wrapper.php');
$token = tools::getValue('tk');
$password = tools::getValue('password');
$password = password_hash($password, PASSWORD_DEFAULT);
$new_token = md5(uniqid(rand(), true));
$sql = 'UPDATE '._SQL_PREFIX_.'logins SET password=?, password_token=? WHERE password_token=?';
$params = array($password, $new_token, $token);
database::update($sql, $params);
$_SESSION['login_error'] = 2;
header('location: /');
?>