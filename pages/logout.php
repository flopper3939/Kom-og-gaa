<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wrapper.php');
login::logout();
header('location: /');
?>