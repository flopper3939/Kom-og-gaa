
<?php
$token = tools::getValue('tk');
$sql = 'SELECT COUNT(*) AS cnt FROM '._SQL_PREFIX_.'logins  WHERE password_token=?';
$params = array($token);
$result = database::selectRow($sql, $params);
if ($result['cnt'] == 0) {
	?>
	<center><h1>Dette link er desværre udløbet.</h1></center><br>
	<center><h1>Klik <a href="/">her</a> for at vende tilbage til login siden.</h1></center><br>
	



	<?php
}
else {
?>


<style>
html { margin:0px;padding:0px;height:100%; }
body { margin:0px;padding:0px;height:100%; }

</style>
<div class="col-md-4" style="background-color:gray; height: 100%;"></div>
<div class="col-md-4">
	<h1 style="text-align: center;">Password reset</h1>
	<form class="form-horizontal" style="margin-top: 50%;margin-left: 20px; margin-right: 20px;" method="POST" action="/forms/resetpassword.php">
	<input type="hidden" name="tk" value="<?php echo tools::getValue('tk'); ?>">
	  <div class="form-group">
	    <label for="password1" class="control-label">New password</label>
	    <input type="password" id="password1" name="password" class="form-control" placeholder="Password">
	  </div>
	  <div class="form-group">
	    <label for="password2" class="control-label">Confirm password</label>
	    <input type="password" id="password2" name="password2" class="form-control" placeholder="Password">
	  </div>
	  <div class="form-group">
	      <button type="submit" class="btn btn-primary" style="width:100%;">Update password</button>
	    </div>
	  </div>
	</form>
</div>
<div class="col-md-4" style="background-color:gray; height: 100%;"></div>
<script type="text/javascript">
	run = false;
	$('.form-horizontal').submit(function(e) {
		if (!run) 
		{
			run = true;
			e.preventDefault();
			if ($('#password1').val() == $('#password2').val()) {

				$('#password2').remove();
				$('.form-horizontal').submit();
			}
			else {
				swal("Error", "Password does not match", "error");
			}
		}

	});
</script>
<?php } ?>