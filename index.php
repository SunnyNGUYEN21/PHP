<?php
	// initialisation des paramètres du site
	require_once('Defines/structure.php');
	require_once(PATH_LANGUES.PATH_FR.'textes.php');
	require_once(PATH_DEFINES.'configuration.php');
	require_once(PATH_LIB.'base.php');
	  require_once(PATH_LIB.PATH_BDD.'bdd.php');
  require_once(PATH_MODEL.'diaporama.php');
	$base = new Bases();
	 $diapos = new Diapos();
	
	



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
	  if(isset($_GET['page'])){
    if($_GET['page'] == "login"){
      $page = $_GET['page'];
    }else{
      if(isset($_SESSION['logged'])){
        if($_SESSION['logged'] == 1){
          if(is_file(PATH_CONTROLLER.$_GET['page'].".php")){
            $page = $_GET['page'];
          }else{
            $page = "erreur";
          }
        }else{
          $page = "page";
        }
      }else{
        $page = "page";
      }
    }
  }else{
    $page = "page";
  }
    require_once(PATH_CONTROLLER.$page.'.php');
?>
