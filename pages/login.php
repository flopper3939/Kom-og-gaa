		<link rel="stylesheet" href="/css/login.css">
		<div id="login">
		  <h1 id="header">Login</h1>
		  <form class="form1" method="POST" action="/forms/login.php">
		    <input type="email" placeholder="Email" name="email" required></input><br />
		    <input type="password" placeholder="Password" name="password" required></input><br />
		    <input type="submit" class="btn btn-primary" value="Login"></input>
		  </form>
		  <form class="form2" style="display: none;">
		  	<h2 style="margin-top:0px;">Enter you'r email</h2>
		    <input type="email" class="email-form2" placeholder="Email" name="email" required=""></input>
		    <input type="submit" class="btn btn-primary reset-button" value="Reset"></input>
		  </form>
		  <a class="forgot-pass-btn" href="#">Glemt kodeord?</a>
		</div>
		<script type="text/javascript">
			$('.forgot-pass-btn').click(function() {
				if ($('.forgot-pass-btn').html() == 'Glemt kodeord?') {
					$('.form1').slideUp(300);
					$('.form2').delay( 300 ).slideDown();
					$('#header').html("Reset password!");
					$('.forgot-pass-btn').html('Tilbage til login');
				}
				else {
					$('.form2').slideUp(300);
					$('.form1').delay( 300 ).slideDown();
					$('#header').html("Login");
					$('.forgot-pass-btn').html('Glemt kodeord?');
				}

			});
			$('.form2').submit(function( e ) {
				e.preventDefault();
	
				$.post( "ajax/resetPassword.php", { email: $('.email-form2').val() } );
				swal("", "Please check your email for instructions on how to reset your password.", "success");
			});


		</script>
<?php
if (isset($_SESSION['login_error'])) {
	if ($_SESSION['login_error'] == 1) {
		?>
		<script>
		swal("Oops...", "Wrong email or password", "error");

		</script>

		<?php
		unset($_SESSION['login_error']);
	}
	if ($_SESSION['login_error'] == 2) {
	?>
	<script>
	swal("Password updated", "Wrong email or password", "success");

	</script>

	<?php
	unset($_SESSION['login_error']);
	}
}

?>