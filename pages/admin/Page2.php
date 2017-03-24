<?php
// Only accsess if admin is 2 or higher
if ($context->admin < 2) {
	header('Location: /');
	die();
}
?>
<h1>This site is only availible if you admin right is 2 or higher</h1>