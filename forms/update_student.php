<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wrapper.php');
$CSRF = CSRF::checkToken($_POST);
if ($CSRF != 0) {
	// Previous page
	header('Location: '._HOST_.'/page/mysite' + $CSRF);
}
echo $CSRF;
$firstname = tools::getValue('firstname');
$lastname = tools::getValue('lastname');
$id = tools::getValue('student_id');
$stud = new student($id);

$stud->first_name = $firstname;
$stud->last_name = $lastname;
$stud->save();
header('Location: '._HOST_.'/page/mysite');



?>