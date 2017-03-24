<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wrapper.php');
$email = tools::getValue('email');

$sql = 'SELECT password_token, CONCAT(first_name, " ", last_name) AS name FROM '._SQL_PREFIX_.'logins l LEFT JOIN '._SQL_PREFIX_.'student s ON l.id_student = s.id_student WHERE email = ?';
$params = array($email);


$result = database::selectRow($sql, $params);
if (!$result) {
	die();
}



$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'To: '.$result['name'].' <'.$email.'>';
$headers[] = 'From: Webmaster <webmaster@localhost>';

echo _HOST_.'/passwordReset/'.$result['password_token'];


mail($email, "Password reset", "Hej " . $result['name'] .'.\n\n Du har for nyeligt genskabt dit password.\n\n Klik <a href="'._HOST_.'/passwordReset/'.$result['password_token'].'">her</a> for at genskabe dit password', implode("\r\n", $headers));
?>