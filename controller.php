<?php 
$context = context::getContext();
$page = tools::getValue('page');
if ($page == '')
	$title = 'Homepage';
else
	$title = $page;
CSRF::cleanUpTokens();

if (!$context->logged_in)
	$title = 'Login';
if (tools::getValue('tk') != '')
	$title = 'Reset password';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">

   		<!-- Jquery -->
		<script src="/lib/jquery-3.1.1.min.js"></script>

		<!-- Bootstap -->
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
   		<link rel="stylesheet" href="/lib/bootstrap-3.3.7-dist/css/bootstrap.min.css">
   		<script src="/lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

		<!-- SweetAlert -->
		<script src="/lib/sweetalert/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/lib/sweetalert/sweetalert.css">


		<!-- Fancybox -->
		<link rel="stylesheet" href="/lib/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<script type="text/javascript" src="/lib/fancybox/jquery.fancybox.pack.js"></script>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="/lib/font-awesome-4.7.0/css/font-awesome.min.css">


		<!-- Menu Theme -->
		<link rel="stylesheet" href="/lib/sidebar/sidebar-collapse.css">

		<title><?php echo $title;?></title>

	</head>
	<body>
<?php
// Checking for CSRF errors
if (isset($_SESSION['CTRF_ERROR'])) {
	if ($_SESSION['CTRF_ERROR'] == 1) {
		echo '<script type="text/javascript">swal("Expired", "This form has expired, please try again.", "error");</script>';
	}
	elseif ($_SESSION['CTRF_ERROR'] == 2) {
		echo '<script type="text/javascript">swal("Error", "The token did not match the server. Please try again. If this problem presists, pleas contact support.", "error");</script>';
	}
	elseif ($_SESSION['CTRF_ERROR'] == 3) {
		echo '<script type="text/javascript">swal("Not set", "The token was not set.", "error");</script>';
	}
}
unset($_SESSION['CTRF_ERROR']);


	if ($context->logged_in) {
		require_once('menu.php');
		if ($context->admin >= 1) {
			require_once('adminmenu.php');
			$menu['admin'] = $adminMenu;


		}

		echo generate_header($menu, $context);
		echo '
		<div class="main-content">';
	}



		// REQUIRE LOGIN

		if (!$context->logged_in) {
			if (tools::getValue('page') == "")
				require_once('pages/login.php');
			elseif (tools::getValue('page') == "passwordReset")
				require_once('pages/forgotPassword.php');
		}
		else {

			$page = tools::getValue('page');
			if ($page == '')
				$page = 'homepage';
			$page .= '.php';

			$page = str_replace('admin', 'admin/', $page);
			if (!file_exists('pages/'.$page))
				require_once('errors/404.php');
			else
				require_once('pages/'.$page);
		}
		if ($context->logged_in) {
		?>
		<script>
			$(function () {
				var links = $('.sidebar-links > div');
				links.on('click', function () {
					links.removeClass('selected');
					$(this).addClass('selected');
				});
			});

		</script>
		<?php 
		}
		if ($context->logged_in)
			echo '</div>
';
		?>
	</body>
</html>