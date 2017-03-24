<h1>test</h1>
<form>
<input type="text" placeholder="Something">
<?php 
echo create_CSRF_Token_Form();
echo time() - $_SESSION['CSRF_TIME'];
?>

</form>