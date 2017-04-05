<?php
	// initialisation des paramètres du site
	require_once('Defines/structure.php');
	require_once(PATH_LANGUES.PATH_FR.'textes.php');
	require_once(PATH_DEFINES.'configuration.php');
	require_once(PATH_LIB.'base.php');
	$base = new base();
	



//	echo PATH_FILE.PATH_CONTROLLERS.$_GET['page']
	
	

	// function isAlpha($string)
	// {
		
		// if (isset($string) && $string !='' && is_string($string) && !preg_match('/[\'^£$%&*()}{@#-?!><>_+~]/', $string))
		// {
			// return htmlspecialchars($string);
		// }
		// else return false;
	// }
//echo realpath(PATH_CONTROLLER.$_GET('page').'php');
	if(isset($_GET['page']) && $base -> isAlpha($_GET['page']) !=false && is_file(PATH_CONTROLLER.$_GET['page'].".php"))
	$page = $base->isAlpha($_GET['page']);
elseif(!isset($_GET['page']))
	$page="index";
else
	$page="404";

require_once(PATH_CONTROLLER.$page.'.php');

/**/
?>