<?php
$adminMenu = array
(
		array('pagename' => 'Admin page 1', 'pagelink' => 'adminPage1')
);
if ($context->admin == 2) {
	array_push($adminMenu, array('pagename' => 'Admin page 2', 'pagelink' => 'adminPage2'));
}

?>