<?php

echo "<pre>";
print_r($_POST);
print_r($_GET);
//print_r($_SESSION);
echo "</pre>";


foreach($_POST as $cle=>$val) {
	$$cle=$val;
	
}

if(!isset($url) || !$base->isAlpha($url) || !is_file(PATH_CONTROLLER.$url.".php")) :
		header("location:index.php?page=index&message=url_invalide");
		exit();
		

elseif(!isset($user) || !$base->isAlpha($user)):
header("location:index.php?page=".$url."&message=identifiant_invalide");
exit ();

elseif(!isset($password) || !$base->isPassword($password)):
header("location:index.php?page=".$url."&message=password_invalide");
exit ();
elseif($user != $monidentifiant) :
header("locationindex.php?page=".$url."&message=identifiant_invalide");
exit();
elseif(!password_verify($password,$monpassword)):
header("location:index.php?page=".$url."&message=password_invalide");
exit();
else:
	$base::login($user);
	
	if($_SESSION['logged']==true) header("location:index.php?page=".$url."&message=connecte");
	else header("location:index.php?page=".$url."&message=pas_connecte");
	endif;
	