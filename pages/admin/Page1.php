<?php
// Only accsess if admin is 2 or higher
if ($context->admin < 1) {
	header('Location: /');
	die();
}
?>
<h1>This site is only availible if you admin right is 1 or higher</h1>