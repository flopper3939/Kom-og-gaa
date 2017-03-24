<?php


  function dnd($var) {
  	if (isset($var->structure))
  		unset($var->structure);
  	echo '<pre>';
  	echo print_r($var, true);
  	echo '</pre>';
  	die();
  }
  	function validate_CSRF() {
  	$token = tools::getValue('CSRF_Token');
	  	if ($token == $_SESSION['CSRF_TOKEN']) {
	  		return true;
	  	}
	  	else {
	  		return false;
	  	}
  	}

	function create_CSRF_Token_Form() {
		$html = '<input type="hidden" name="CSRF_Token" value="' . $_SESSION['CSRF_TOKEN'] . '">';
		return $html;
	}

  	function generate_header($menu, $context) {
  	$html = '
  	<aside class="sidebar-left-collapse">
  		<img class="center-block img-circle profile-picture" src="'._IMG_PATH_.'students/'.$context->student->id_student.'.jpg">
		<div class="sidebar-links">';
	foreach($menu as $key => $row) 
	{
		$html .= '
			<div class="link-blue">
				<a href="#">
					<i class="fa fa-circle-thin"></i>'.$key.'
				</a>
				<ul class="sub-links">
				';
		foreach($row as $subMenu) 
		{
			$html .= '	<li><a href="'._HOST_.'/page/'.$subMenu['pagelink'].'">'.$subMenu['pagename'].'</a></li>
			';
		}
		$html .= '
				</ul>
			</div>';
	}
	$html .= '
		</div>
		<a class="btn btn-primary logoutButton btn-lg" href="http://localhost/page/logout">Logout</a>
	</aside>';

  	return $html;
  }





?>