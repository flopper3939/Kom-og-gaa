<?php
session_start();
set_include_path($_SERVER['DOCUMENT_ROOT']);
require_once('config.php');
require_once('functions.php');
if (version_compare(phpversion(), '7.0', '<')) {
    require_once('lib/phpRandom/random.php');
}

/*
INCLUDE CLASSES

*/
set_include_path($_SERVER['DOCUMENT_ROOT'].'/classes/');
require_once('CSRF.php');
require_once('db.php');
require_once('tools.php');
require_once('objectModel.php');
require_once('context.php');
require_once('student.php');
require_once('login.php');




?>